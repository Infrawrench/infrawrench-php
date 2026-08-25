<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class OnCallScheduleCreate implements \JsonSerializable
{
    /** @param list<string> $participantUserIds */
    public function __construct(
        public readonly string $name,
        public readonly string $timezone,
        public readonly int $rotationDays,
        public readonly string $handoffTime,
        public readonly string $startDate,
        public readonly array $participantUserIds,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toString($data['name'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            rotationDays: Coerce::toInt($data['rotationDays'] ?? null),
            handoffTime: Coerce::toString($data['handoffTime'] ?? null),
            startDate: Coerce::toString($data['startDate'] ?? null),
            participantUserIds: Coerce::mapList($data['participantUserIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
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
            'name' => $this->name,
            'timezone' => $this->timezone,
            'rotationDays' => $this->rotationDays,
            'handoffTime' => $this->handoffTime,
            'startDate' => $this->startDate,
            'participantUserIds' => $this->participantUserIds,
        ];
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
