<?php

/*
 * infrawrench/sdk v1.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.16.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

/**
 * A recurring local-time window during which the rule holds its alerts. Held, not dropped — a held
 * alert is queued and delivered when the window closes.
 *
 * The API may send `null` in place of this object.
 */
final class QuietHours implements \JsonSerializable
{
    /**
     * @param string $timezone IANA zone, e.g. Europe/Berlin
     * @param int $endMinute May be less than startMinute for an overnight window. Equal means empty.
     * @param list<int> $days ISO weekdays the window applies on, matched against the day the window opened. Empty means every day.
     */
    public function __construct(
        public readonly string $timezone,
        public readonly int $startMinute,
        public readonly int $endMinute,
        public readonly array $days,
        public readonly mixed $urgentOverride,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            timezone: Coerce::toString($data['timezone'] ?? null),
            startMinute: Coerce::toInt($data['startMinute'] ?? null),
            endMinute: Coerce::toInt($data['endMinute'] ?? null),
            days: Coerce::mapList($data['days'] ?? null, static fn (mixed $item): int => Coerce::toInt($item)),
            urgentOverride: $data['urgentOverride'] ?? null,
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'timezone' => $this->timezone,
            'startMinute' => $this->startMinute,
            'endMinute' => $this->endMinute,
            'days' => $this->days,
            'urgentOverride' => $this->urgentOverride,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
