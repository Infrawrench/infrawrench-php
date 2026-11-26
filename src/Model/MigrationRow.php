<?php

/*
 * infrawrench/sdk v1.132.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.132.0).
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

final class MigrationRow implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param MigrationCategory::* $category
     * @param MigrationArea::*|null $sourceArea
     * @param array{vcpus: float|null, memoryGb: float|null, gpuCount: float|null, gpuModel: string|null, diskGb: float|null, count: float} $specs
     * @param MigrationCost|null $current What it costs now; null when nothing can price it (never 0).
     * @param array<string, mixed> $target
     * @param 'no-account'|'source-size-unknown'|'no-size-match'|'no-price'|'catalog-unavailable'|null $note Why the target has no figure, when it has none.
     * @param list<MigrationSizeOption> $candidates Target sizes for the picker: qualifying first, cheapest first.
     * @param list<array{id: string, name: string}> $targetTypes
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $accountId,
        public readonly string $category,
        public readonly ?string $sourceRegion,
        public readonly ?string $sourceArea,
        public readonly ?string $instanceType,
        public readonly array $specs,
        public readonly ?MigrationCost $current,
        public readonly array $target,
        public readonly ?string $note,
        public readonly array $candidates,
        public readonly array $targetTypes,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            category: Coerce::toString($data['category'] ?? null),
            sourceRegion: Coerce::toStringOrNull($data['sourceRegion'] ?? null),
            sourceArea: Coerce::toStringOrNull($data['sourceArea'] ?? null),
            instanceType: Coerce::toStringOrNull($data['instanceType'] ?? null),
            specs: Coerce::toArray($data['specs'] ?? null),
            current: Coerce::nullable($data['current'] ?? null, static fn (mixed $value): MigrationCost => MigrationCost::fromArray(Coerce::toArray($value))),
            target: Coerce::toArray($data['target'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            candidates: Coerce::mapList($data['candidates'] ?? null, static fn (mixed $item): MigrationSizeOption => MigrationSizeOption::fromArray(Coerce::toArray($item))),
            targetTypes: Coerce::mapList($data['targetTypes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'accountId' => $this->accountId,
            'category' => $this->category,
            'sourceRegion' => $this->sourceRegion,
            'sourceArea' => $this->sourceArea,
            'instanceType' => $this->instanceType,
            'specs' => $this->specs,
            'current' => $this->current?->toArray(),
            'target' => $this->target,
            'note' => $this->note,
            'candidates' => array_map(static fn (MigrationSizeOption $item): array => $item->toArray(), $this->candidates),
            'targetTypes' => $this->targetTypes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
