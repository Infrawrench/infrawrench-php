<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class ComplianceEvidenceSourceResult implements \JsonSerializable
{
    /**
     * @param 'snapshot'|'period' $kind `snapshot` sources describe the org at generation time; `period` sources are filtered to the period.
     * @param 'present'|'gap'|'no-data'|'unavailable' $status `present`: evidence exists and shows nothing wrong. `gap`: evidence shows a problem. `no-data`: the source ran and has nothing to show. `unavailable`: the source could not be read (missing permission, read failure, no evaluator); never counted as evidence.
     * @param list<ComplianceEvidenceMetric> $metrics
     * @param list<string> $gaps
     * @param int $itemCount Rows this source contributes to an evidence pack.
     */
    public function __construct(
        public readonly string $sourceId,
        public readonly string $label,
        public readonly string $kind,
        public readonly string $status,
        public readonly string $summary,
        public readonly array $metrics,
        public readonly array $gaps,
        public readonly int $itemCount,
        public readonly ?string $error,
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
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            summary: Coerce::toString($data['summary'] ?? null),
            metrics: Coerce::mapList($data['metrics'] ?? null, static fn (mixed $item): ComplianceEvidenceMetric => ComplianceEvidenceMetric::fromArray(Coerce::toArray($item))),
            gaps: Coerce::mapList($data['gaps'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            itemCount: Coerce::toInt($data['itemCount'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
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
            'sourceId' => $this->sourceId,
            'label' => $this->label,
            'kind' => $this->kind,
            'status' => $this->status,
            'summary' => $this->summary,
            'metrics' => array_map(static fn (ComplianceEvidenceMetric $item): array => $item->toArray(), $this->metrics),
            'gaps' => $this->gaps,
            'itemCount' => $this->itemCount,
            'error' => $this->error,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
