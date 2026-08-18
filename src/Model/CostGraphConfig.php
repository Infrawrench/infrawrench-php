<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
 * The saved graph. Identical to the config an ad-hoc `cost_graph` dashboard widget stores inline —
 * a report is that config given a name and an id.
 */
final class CostGraphConfig implements \JsonSerializable
{
    /**
     * @param 'stacked_bar'|'multi_bar'|'line'|'area'|'pie' $chartType
     * @param 'daily'|'weekly'|'monthly'|'cumulative' $binning
     * @param array{kind: 'relative', preset: '7d'|'30d'|'90d'|'mtd'|'last_month'|'qtd'|'ytd'|'12m'}|array{kind: 'absolute', from: string, to: string} $dateRange
     * @param list<CostReportFilter>|null $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` at query time, server-side. Editing the saved filter changes every graph, report and budget referencing it; a reference that fails to resolve makes the query error rather than silently run unfiltered.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) overlaid on the forecast — known future cost the trend cannot see, drawn as a second dashed line beside the trend rather than instead of it. Only meaningful alongside `showForecast`.
     * @param 'cash'|'amortized'|null $costBasis
     */
    public function __construct(
        public readonly float $version,
        public readonly string $chartType,
        public readonly string $binning,
        public readonly array $dateRange,
        public readonly string $groupBy,
        public readonly ?string $groupByTagKey = null,
        public readonly ?array $filters = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?int $topN = null,
        public readonly ?bool $comparePreviousPeriod = null,
        public readonly ?bool $showForecast = null,
        public readonly ?string $scenarioModelId = null,
        public readonly ?string $costBasis = null,
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
            chartType: Coerce::toString($data['chartType'] ?? null),
            binning: Coerce::toString($data['binning'] ?? null),
            dateRange: $data['dateRange'] ?? null,
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostReportFilter => CostReportFilter::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            topN: Coerce::toIntOrNull($data['topN'] ?? null),
            comparePreviousPeriod: Coerce::toBoolOrNull($data['comparePreviousPeriod'] ?? null),
            showForecast: Coerce::toBoolOrNull($data['showForecast'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'version' => $this->version,
            'chartType' => $this->chartType,
            'binning' => $this->binning,
            'dateRange' => $this->dateRange,
            'groupBy' => $this->groupBy,
        ];
        if ($this->groupByTagKey !== null) {
            $payload['groupByTagKey'] = $this->groupByTagKey;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (CostReportFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }
        if ($this->topN !== null) {
            $payload['topN'] = $this->topN;
        }
        if ($this->comparePreviousPeriod !== null) {
            $payload['comparePreviousPeriod'] = $this->comparePreviousPeriod;
        }
        if ($this->showForecast !== null) {
            $payload['showForecast'] = $this->showForecast;
        }
        if ($this->scenarioModelId !== null) {
            $payload['scenarioModelId'] = $this->scenarioModelId;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
