<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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

/**
 * An absolute range covers at most 1096 days, and at most 367 at daily granularity. Every relative
 * preset fits every granularity.
 */
final class CommitmentReportConfig implements \JsonSerializable
{
    /**
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string} $dateRange
     * @param CommitmentReportGranularity::* $granularity
     * @param CommitmentReportGroupBy::* $groupBy
     * @param CommitmentReportMetric::* $metric
     */
    public function __construct(
        public readonly float $version,
        public readonly array $dateRange,
        public readonly string $granularity,
        public readonly string $groupBy,
        public readonly CommitmentReportFilters $filters,
        public readonly string $metric,
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
            version: Coerce::toFloat($data['version'] ?? null),
            dateRange: $data['dateRange'] ?? null,
            granularity: Coerce::toString($data['granularity'] ?? null),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            filters: CommitmentReportFilters::fromArray(Coerce::toArray($data['filters'] ?? null)),
            metric: Coerce::toString($data['metric'] ?? null),
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
            'version' => $this->version,
            'dateRange' => $this->dateRange,
            'granularity' => $this->granularity,
            'groupBy' => $this->groupBy,
            'filters' => $this->filters->toArray(),
            'metric' => $this->metric,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
