<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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

final class CarbonEstimate implements \JsonSerializable
{
    /**
     * @param list<CarbonUnestimatedRow> $unestimated
     * @param int $unestimatedCount Total unestimated resources; `unestimated` is capped at 200.
     * @param int $duplicateCount Kubernetes nodes skipped because their machine is already counted as an instance (a GKE node is also a GCE instance). Counted once, and the number skipped is said.
     * @param list<CarbonGroup> $byRegion
     * @param list<CarbonGroup> $byAccount
     * @param list<CarbonGroup> $byProvider
     * @param list<CarbonRow> $rows
     */
    public function __construct(
        public readonly int $windowDays,
        public readonly float $totalKgCo2e,
        public readonly float $totalKwh,
        public readonly int $estimatedCount,
        public readonly array $unestimated,
        public readonly int $unestimatedCount,
        public readonly int $duplicateCount,
        public readonly array $byRegion,
        public readonly array $byAccount,
        public readonly array $byProvider,
        public readonly array $rows,
        public readonly CarbonAssumptions $assumptions,
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
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            totalKgCo2e: Coerce::toFloat($data['totalKgCo2e'] ?? null),
            totalKwh: Coerce::toFloat($data['totalKwh'] ?? null),
            estimatedCount: Coerce::toInt($data['estimatedCount'] ?? null),
            unestimated: Coerce::mapList($data['unestimated'] ?? null, static fn (mixed $item): CarbonUnestimatedRow => CarbonUnestimatedRow::fromArray(Coerce::toArray($item))),
            unestimatedCount: Coerce::toInt($data['unestimatedCount'] ?? null),
            duplicateCount: Coerce::toInt($data['duplicateCount'] ?? null),
            byRegion: Coerce::mapList($data['byRegion'] ?? null, static fn (mixed $item): CarbonGroup => CarbonGroup::fromArray(Coerce::toArray($item))),
            byAccount: Coerce::mapList($data['byAccount'] ?? null, static fn (mixed $item): CarbonGroup => CarbonGroup::fromArray(Coerce::toArray($item))),
            byProvider: Coerce::mapList($data['byProvider'] ?? null, static fn (mixed $item): CarbonGroup => CarbonGroup::fromArray(Coerce::toArray($item))),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): CarbonRow => CarbonRow::fromArray(Coerce::toArray($item))),
            assumptions: CarbonAssumptions::fromArray(Coerce::toArray($data['assumptions'] ?? null)),
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
            'windowDays' => $this->windowDays,
            'totalKgCo2e' => $this->totalKgCo2e,
            'totalKwh' => $this->totalKwh,
            'estimatedCount' => $this->estimatedCount,
            'unestimated' => array_map(static fn (CarbonUnestimatedRow $item): array => $item->toArray(), $this->unestimated),
            'unestimatedCount' => $this->unestimatedCount,
            'duplicateCount' => $this->duplicateCount,
            'byRegion' => array_map(static fn (CarbonGroup $item): array => $item->toArray(), $this->byRegion),
            'byAccount' => array_map(static fn (CarbonGroup $item): array => $item->toArray(), $this->byAccount),
            'byProvider' => array_map(static fn (CarbonGroup $item): array => $item->toArray(), $this->byProvider),
            'rows' => array_map(static fn (CarbonRow $item): array => $item->toArray(), $this->rows),
            'assumptions' => $this->assumptions->toArray(),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
