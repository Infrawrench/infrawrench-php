<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
 * The saved graph. Identical to the config an ad-hoc `cost_graph` dashboard widget stores inline:
 * a report is that config given a name and an id.
 */
final class CostGraphConfig implements \JsonSerializable
{
    /**
     * @param 'stacked_bar'|'multi_bar'|'line'|'area'|'pie'|'donut'|'table' $chartType How the series are drawn. `pie` and `donut` draw period totals per group; `table` lists every bucket as a row with a column per series and a total.
     * @param CostBinning::* $binning
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string} $dateRange
     * @param list<CostReportFilter>|null $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` at query time, server-side. Editing the saved filter changes every graph, report and budget referencing it; a reference that fails to resolve makes the query error rather than silently run unfiltered.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) overlaid on the forecast; known future cost the trend cannot see, drawn as a second dashed line beside the trend rather than instead of it. Only meaningful alongside `showForecast`.
     * @param 'cash'|'amortized'|'blended'|null $costBasis
     * @param CostMeasure::*|null $measure
     * @param string|null $usageUnit The usage unit a `usage` measure sums, exactly as the provider spells it (`Hrs`, `GB-Mo`). List them with GET /costs/dimensions?dimension=usage-units. Required for `usage`, refused for any other measure.
     * @param bool|null $cumulative Running totals from the start of the range, at any bin size. Omitted is off. Totals then report the last point rather than the sum.
     * @param string|null $unitCostMetricId Divide spend by this business metric (an id, so a key rename never re-points the graph).
     * @param 'unit_cost'|'margin'|'usage_unit_cost'|'raw_metric'|null $unitCostMode The calculation. `usage_unit_cost` needs `unitCostUsageUnit` instead of a metric; the others need `unitCostMetricId`.
     * @param float|null $unitCostScale "Per N units" for a ratio, or the unit a raw metric is shown in. Absent is 1.
     * @param string|null $unitCostUsageUnit `usage_unit_cost` only: the provider usage unit to divide by.
     * @param list<array{key: string, op: 'in'|'not_in', values: list<string>}>|null $unitCostLabelFilters Keep only metric values carrying these labels.
     * @param string|null $unitCostGroupByLabel One line per value of this metric label.
     * @param bool|null $adjusted Draw the org's billing rules applied.
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
        public readonly ?string $measure = null,
        public readonly ?string $usageUnit = null,
        public readonly ?bool $cumulative = null,
        public readonly ?string $unitCostMetricId = null,
        public readonly ?string $unitCostMode = null,
        public readonly ?float $unitCostScale = null,
        public readonly ?string $unitCostUsageUnit = null,
        public readonly ?array $unitCostLabelFilters = null,
        public readonly ?string $unitCostGroupByLabel = null,
        public readonly ?bool $adjusted = null,
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
            measure: Coerce::toStringOrNull($data['measure'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
            cumulative: Coerce::toBoolOrNull($data['cumulative'] ?? null),
            unitCostMetricId: Coerce::toStringOrNull($data['unitCostMetricId'] ?? null),
            unitCostMode: Coerce::toStringOrNull($data['unitCostMode'] ?? null),
            unitCostScale: Coerce::toFloatOrNull($data['unitCostScale'] ?? null),
            unitCostUsageUnit: Coerce::toStringOrNull($data['unitCostUsageUnit'] ?? null),
            unitCostLabelFilters: Coerce::nullable($data['unitCostLabelFilters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            unitCostGroupByLabel: Coerce::toStringOrNull($data['unitCostGroupByLabel'] ?? null),
            adjusted: Coerce::toBoolOrNull($data['adjusted'] ?? null),
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
        if ($this->measure !== null) {
            $payload['measure'] = $this->measure;
        }
        if ($this->usageUnit !== null) {
            $payload['usageUnit'] = $this->usageUnit;
        }
        if ($this->cumulative !== null) {
            $payload['cumulative'] = $this->cumulative;
        }
        if ($this->unitCostMetricId !== null) {
            $payload['unitCostMetricId'] = $this->unitCostMetricId;
        }
        if ($this->unitCostMode !== null) {
            $payload['unitCostMode'] = $this->unitCostMode;
        }
        if ($this->unitCostScale !== null) {
            $payload['unitCostScale'] = $this->unitCostScale;
        }
        if ($this->unitCostUsageUnit !== null) {
            $payload['unitCostUsageUnit'] = $this->unitCostUsageUnit;
        }
        if ($this->unitCostLabelFilters !== null) {
            $payload['unitCostLabelFilters'] = $this->unitCostLabelFilters;
        }
        if ($this->unitCostGroupByLabel !== null) {
            $payload['unitCostGroupByLabel'] = $this->unitCostGroupByLabel;
        }
        if ($this->adjusted !== null) {
            $payload['adjusted'] = $this->adjusted;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
