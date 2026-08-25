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

final class BackupCoverageResponse implements \JsonSerializable
{
    /**
     * @param list<BackupFinding> $findings Gaps, worst severity first.
     * @param list<BackupCoverageRow> $resources
     */
    public function __construct(
        public readonly array $findings,
        public readonly BackupSeverityCounts $counts,
        public readonly BackupKindCounts $kindCounts,
        public readonly int $totalCount,
        public readonly array $resources,
        public readonly BackupCoverageSummary $summary,
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
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): BackupFinding => BackupFinding::fromArray(Coerce::toArray($item))),
            counts: BackupSeverityCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
            kindCounts: BackupKindCounts::fromArray(Coerce::toArray($data['kindCounts'] ?? null)),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): BackupCoverageRow => BackupCoverageRow::fromArray(Coerce::toArray($item))),
            summary: BackupCoverageSummary::fromArray(Coerce::toArray($data['summary'] ?? null)),
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
            'findings' => array_map(static fn (BackupFinding $item): array => $item->toArray(), $this->findings),
            'counts' => $this->counts->toArray(),
            'kindCounts' => $this->kindCounts->toArray(),
            'totalCount' => $this->totalCount,
            'resources' => array_map(static fn (BackupCoverageRow $item): array => $item->toArray(), $this->resources),
            'summary' => $this->summary->toArray(),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
