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

final class EnvironmentDiffResponse implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param list<EnvironmentDiffTypeSummary> $types Every resource type present on either side, most-divergent first.
     * @param list<EnvironmentDiffEntry> $entries Only the slots that differ; identical pairs are counted, not listed.
     * @param list<EnvironmentDiffUnavailableType> $unavailableTypes Resource types excluded because they could not be listed. Always empty over this API — it reads already-synced rows, which cannot half-fail — and populated only by the desktop and CLI local modes, which list live.
     */
    public function __construct(
        public readonly EnvironmentDiffSideSummary $a,
        public readonly EnvironmentDiffSideSummary $b,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly array $types,
        public readonly array $entries,
        public readonly EnvironmentDiffTotals $totals,
        public readonly array $unavailableTypes,
        public readonly bool $includeIdentityFields,
        public readonly string $generatedAt,
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
            a: EnvironmentDiffSideSummary::fromArray(Coerce::toArray($data['a'] ?? null)),
            b: EnvironmentDiffSideSummary::fromArray(Coerce::toArray($data['b'] ?? null)),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            types: Coerce::mapList($data['types'] ?? null, static fn (mixed $item): EnvironmentDiffTypeSummary => EnvironmentDiffTypeSummary::fromArray(Coerce::toArray($item))),
            entries: Coerce::mapList($data['entries'] ?? null, static fn (mixed $item): EnvironmentDiffEntry => EnvironmentDiffEntry::fromArray(Coerce::toArray($item))),
            totals: EnvironmentDiffTotals::fromArray(Coerce::toArray($data['totals'] ?? null)),
            unavailableTypes: Coerce::mapList($data['unavailableTypes'] ?? null, static fn (mixed $item): EnvironmentDiffUnavailableType => EnvironmentDiffUnavailableType::fromArray(Coerce::toArray($item))),
            includeIdentityFields: Coerce::toBool($data['includeIdentityFields'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'a' => $this->a->toArray(),
            'b' => $this->b->toArray(),
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'types' => array_map(static fn (EnvironmentDiffTypeSummary $item): array => $item->toArray(), $this->types),
            'entries' => array_map(static fn (EnvironmentDiffEntry $item): array => $item->toArray(), $this->entries),
            'totals' => $this->totals->toArray(),
            'unavailableTypes' => array_map(static fn (EnvironmentDiffUnavailableType $item): array => $item->toArray(), $this->unavailableTypes),
            'includeIdentityFields' => $this->includeIdentityFields,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
