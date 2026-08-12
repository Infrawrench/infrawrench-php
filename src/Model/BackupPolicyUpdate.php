<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class BackupPolicyUpdate implements \JsonSerializable
{
    /** @param list<string>|null $resourceTypeIds */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?array $resourceTypeIds = null,
        public readonly ?string $tagKey = null,
        public readonly ?string $tagValue = null,
        public readonly ?int $maxRpoHours = null,
        public readonly ?int $minRetentionDays = null,
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
            resourceTypeIds: Coerce::nullable($data['resourceTypeIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
            maxRpoHours: Coerce::toIntOrNull($data['maxRpoHours'] ?? null),
            minRetentionDays: Coerce::toIntOrNull($data['minRetentionDays'] ?? null),
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
        if ($this->resourceTypeIds !== null) {
            $payload['resourceTypeIds'] = $this->resourceTypeIds;
        }
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }
        if ($this->tagValue !== null) {
            $payload['tagValue'] = $this->tagValue;
        }
        if ($this->maxRpoHours !== null) {
            $payload['maxRpoHours'] = $this->maxRpoHours;
        }
        if ($this->minRetentionDays !== null) {
            $payload['minRetentionDays'] = $this->minRetentionDays;
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
