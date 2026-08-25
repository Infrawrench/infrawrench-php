<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class BackupPolicy implements \JsonSerializable
{
    /**
     * @param list<string> $resourceTypeIds Resource types the policy selects; empty selects every stateful type.
     * @param string|null $tagKey Tag key that must be present. Matched case-insensitively.
     * @param string|null $tagValue Required value of `tagKey`, matched exactly. Null means presence is enough.
     * @param int|null $maxRpoHours The newest backup must be no older than this. Null means no RPO demand.
     * @param int|null $minRetentionDays Provider-native retention must be at least this. Null means no demand.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $resourceTypeIds,
        public readonly ?string $tagKey,
        public readonly ?string $tagValue,
        public readonly ?int $maxRpoHours,
        public readonly ?int $minRetentionDays,
        public readonly bool $enabled,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            resourceTypeIds: Coerce::mapList($data['resourceTypeIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
            maxRpoHours: Coerce::toIntOrNull($data['maxRpoHours'] ?? null),
            minRetentionDays: Coerce::toIntOrNull($data['minRetentionDays'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'resourceTypeIds' => $this->resourceTypeIds,
            'tagKey' => $this->tagKey,
            'tagValue' => $this->tagValue,
            'maxRpoHours' => $this->maxRpoHours,
            'minRetentionDays' => $this->minRetentionDays,
            'enabled' => $this->enabled,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
