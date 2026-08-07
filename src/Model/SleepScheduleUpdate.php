<?php

/*
 * infrawrench/sdk v0.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.38.0).
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

final class SleepScheduleUpdate implements \JsonSerializable
{
    /**
     * @param list<int>|null $daysOfWeek ISO weekdays the resource is worked on: 1 = Monday … 7 = Sunday.
     * @param string|null $stopTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string|null $startTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string|null $timezone IANA timezone the wall-clock times are computed in (DST-safe).
     */
    public function __construct(
        public readonly ?array $daysOfWeek = null,
        public readonly ?string $stopTime = null,
        public readonly ?string $startTime = null,
        public readonly ?string $timezone = null,
        public readonly ?bool $paused = null,
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
            daysOfWeek: Coerce::nullable($data['daysOfWeek'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): int => Coerce::toInt($item))),
            stopTime: Coerce::toStringOrNull($data['stopTime'] ?? null),
            startTime: Coerce::toStringOrNull($data['startTime'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            paused: Coerce::toBoolOrNull($data['paused'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
        ];
        if ($this->daysOfWeek !== null) {
            $payload['daysOfWeek'] = $this->daysOfWeek;
        }
        if ($this->stopTime !== null) {
            $payload['stopTime'] = $this->stopTime;
        }
        if ($this->startTime !== null) {
            $payload['startTime'] = $this->startTime;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->paused !== null) {
            $payload['paused'] = $this->paused;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
