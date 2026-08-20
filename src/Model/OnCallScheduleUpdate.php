<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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

final class OnCallScheduleUpdate implements \JsonSerializable
{
    /** @param list<string>|null $participantUserIds */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $timezone = null,
        public readonly ?int $rotationDays = null,
        public readonly ?string $handoffTime = null,
        public readonly ?string $startDate = null,
        public readonly ?array $participantUserIds = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            rotationDays: Coerce::toIntOrNull($data['rotationDays'] ?? null),
            handoffTime: Coerce::toStringOrNull($data['handoffTime'] ?? null),
            startDate: Coerce::toStringOrNull($data['startDate'] ?? null),
            participantUserIds: Coerce::nullable($data['participantUserIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        ];
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->rotationDays !== null) {
            $payload['rotationDays'] = $this->rotationDays;
        }
        if ($this->handoffTime !== null) {
            $payload['handoffTime'] = $this->handoffTime;
        }
        if ($this->startDate !== null) {
            $payload['startDate'] = $this->startDate;
        }
        if ($this->participantUserIds !== null) {
            $payload['participantUserIds'] = $this->participantUserIds;
        }
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
