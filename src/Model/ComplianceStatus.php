<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class ComplianceStatus implements \JsonSerializable
{
    /**
     * @param array{from: string, to: string} $period
     * @param list<ComplianceControlRow> $controls
     * @param list<ComplianceEvidenceSourceResult> $sources
     */
    public function __construct(
        public readonly ComplianceFrameworkSummary $framework,
        public readonly array $period,
        public readonly array $controls,
        public readonly array $sources,
        public readonly ComplianceStatusCounts $counts,
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
            framework: ComplianceFrameworkSummary::fromArray(Coerce::toArray($data['framework'] ?? null)),
            period: Coerce::toArray($data['period'] ?? null),
            controls: Coerce::mapList($data['controls'] ?? null, static fn (mixed $item): ComplianceControlRow => ComplianceControlRow::fromArray(Coerce::toArray($item))),
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): ComplianceEvidenceSourceResult => ComplianceEvidenceSourceResult::fromArray(Coerce::toArray($item))),
            counts: ComplianceStatusCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
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
            'framework' => $this->framework->toArray(),
            'period' => $this->period,
            'controls' => array_map(static fn (ComplianceControlRow $item): array => $item->toArray(), $this->controls),
            'sources' => array_map(static fn (ComplianceEvidenceSourceResult $item): array => $item->toArray(), $this->sources),
            'counts' => $this->counts->toArray(),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
