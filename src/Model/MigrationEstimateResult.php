<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class MigrationEstimateResult implements \JsonSerializable
{
    /**
     * @param array{kind: 'service'|'resources', label: string, resourceCount: int} $source
     * @param array{pluginId: PluginId::*, pluginName: string} $target
     * @param list<MigrationRow> $rows
     * @param list<MigrationUnmatchedRow> $unmatched
     * @param bool $terraform The target plugin can write Terraform for at least one matched row.
     */
    public function __construct(
        public readonly ?string $estimateId,
        public readonly string $name,
        public readonly array $source,
        public readonly array $target,
        public readonly MigrationRegionNote $region,
        public readonly array $rows,
        public readonly array $unmatched,
        public readonly MigrationTotals $totals,
        public readonly ?string $displayCurrency,
        public readonly bool $terraform,
        public readonly bool $truncated,
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
            estimateId: Coerce::toStringOrNull($data['estimateId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            source: Coerce::toArray($data['source'] ?? null),
            target: Coerce::toArray($data['target'] ?? null),
            region: MigrationRegionNote::fromArray(Coerce::toArray($data['region'] ?? null)),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): MigrationRow => MigrationRow::fromArray(Coerce::toArray($item))),
            unmatched: Coerce::mapList($data['unmatched'] ?? null, static fn (mixed $item): MigrationUnmatchedRow => MigrationUnmatchedRow::fromArray(Coerce::toArray($item))),
            totals: MigrationTotals::fromArray(Coerce::toArray($data['totals'] ?? null)),
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
            terraform: Coerce::toBool($data['terraform'] ?? null),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'estimateId' => $this->estimateId,
            'name' => $this->name,
            'source' => $this->source,
            'target' => $this->target,
            'region' => $this->region->toArray(),
            'rows' => array_map(static fn (MigrationRow $item): array => $item->toArray(), $this->rows),
            'unmatched' => array_map(static fn (MigrationUnmatchedRow $item): array => $item->toArray(), $this->unmatched),
            'totals' => $this->totals->toArray(),
            'displayCurrency' => $this->displayCurrency,
            'terraform' => $this->terraform,
            'truncated' => $this->truncated,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
