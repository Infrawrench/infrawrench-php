<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class DrillCoverageResponse implements \JsonSerializable
{
    /**
     * @param list<DrillCoverageRow> $rows
     * @param list<RestoreDrill> $orphanedDrills Drills against a resource no longer in the inventory. Reported rather than dropped: 'we tested this and then removed it' is a fact an auditor asks about.
     */
    public function __construct(
        public readonly array $rows,
        public readonly DrillSummary $summary,
        public readonly int $validDays,
        public readonly array $orphanedDrills,
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
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): DrillCoverageRow => DrillCoverageRow::fromArray(Coerce::toArray($item))),
            summary: DrillSummary::fromArray(Coerce::toArray($data['summary'] ?? null)),
            validDays: Coerce::toInt($data['validDays'] ?? null),
            orphanedDrills: Coerce::mapList($data['orphanedDrills'] ?? null, static fn (mixed $item): RestoreDrill => RestoreDrill::fromArray(Coerce::toArray($item))),
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
            'rows' => array_map(static fn (DrillCoverageRow $item): array => $item->toArray(), $this->rows),
            'summary' => $this->summary->toArray(),
            'validDays' => $this->validDays,
            'orphanedDrills' => array_map(static fn (RestoreDrill $item): array => $item->toArray(), $this->orphanedDrills),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
