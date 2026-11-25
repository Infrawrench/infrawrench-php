<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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

final class MigrationEstimate implements \JsonSerializable
{
    /**
     * @param array{kind: 'service', serviceId: string}|array{kind: 'resources', resourceIds: list<string>} $source
     * @param array<string, MigrationRowOverride> $overrides
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $source,
        public readonly ?string $sourceName,
        public readonly string $targetPluginId,
        public readonly ?string $targetRegion,
        public readonly array $overrides,
        public readonly ?string $createdByUserId,
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
            source: $data['source'] ?? null,
            sourceName: Coerce::toStringOrNull($data['sourceName'] ?? null),
            targetPluginId: Coerce::toString($data['targetPluginId'] ?? null),
            targetRegion: Coerce::toStringOrNull($data['targetRegion'] ?? null),
            overrides: Coerce::mapValues($data['overrides'] ?? null, static fn (mixed $item): MigrationRowOverride => MigrationRowOverride::fromArray(Coerce::toArray($item))),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
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
            'source' => $this->source,
            'sourceName' => $this->sourceName,
            'targetPluginId' => $this->targetPluginId,
            'targetRegion' => $this->targetRegion,
            'overrides' => array_map(static fn (MigrationRowOverride $item): array => $item->toArray(), $this->overrides),
            'createdByUserId' => $this->createdByUserId,
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
