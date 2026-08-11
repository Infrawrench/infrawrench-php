<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class CostQueryResponse implements \JsonSerializable
{
    /**
     * @param list<CostQuerySeries> $series
     * @param list<string> $currencies
     * @param array<string, float> $totals Period total per currency, and always exactly the sum of `series`. Fixed-amount billing-rule charges are deliberately **not** folded in here — they have no series behind them and are reported in `adjustment.fixedTotals` instead.
     * @param list<CostQuerySeries>|null $comparison
     * @param list<CostSeriesPoint>|null $forecast The **unadjusted trend** projection. Stays the trend even when a scenario is applied, so a reader can always see what the fit said before anybody's assumptions touched it.
     * @param array<string, float>|null $previousTotals
     */
    public function __construct(
        public readonly array $series,
        public readonly array $currencies,
        public readonly array $totals,
        public readonly ?array $comparison = null,
        public readonly ?array $forecast = null,
        public readonly ?CostScenarioResult $scenario = null,
        public readonly ?array $previousTotals = null,
        public readonly ?CostAdjustmentSummary $adjustment = null,
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
            series: Coerce::mapList($data['series'] ?? null, static fn (mixed $item): CostQuerySeries => CostQuerySeries::fromArray(Coerce::toArray($item))),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            totals: Coerce::mapValues($data['totals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            comparison: Coerce::nullable($data['comparison'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostQuerySeries => CostQuerySeries::fromArray(Coerce::toArray($item)))),
            forecast: Coerce::nullable($data['forecast'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostSeriesPoint => CostSeriesPoint::fromArray(Coerce::toArray($item)))),
            scenario: Coerce::nullable($data['scenario'] ?? null, static fn (mixed $value): CostScenarioResult => CostScenarioResult::fromArray(Coerce::toArray($value))),
            previousTotals: Coerce::nullable($data['previousTotals'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): float => Coerce::toFloat($item))),
            adjustment: Coerce::nullable($data['adjustment'] ?? null, static fn (mixed $value): CostAdjustmentSummary => CostAdjustmentSummary::fromArray(Coerce::toArray($value))),
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
            'series' => array_map(static fn (CostQuerySeries $item): array => $item->toArray(), $this->series),
            'currencies' => $this->currencies,
            'totals' => $this->totals,
        ];
        if ($this->comparison !== null) {
            $payload['comparison'] = array_map(static fn (CostQuerySeries $item): array => $item->toArray(), $this->comparison);
        }
        if ($this->forecast !== null) {
            $payload['forecast'] = array_map(static fn (CostSeriesPoint $item): array => $item->toArray(), $this->forecast);
        }
        if ($this->scenario !== null) {
            $payload['scenario'] = $this->scenario->toArray();
        }
        if ($this->previousTotals !== null) {
            $payload['previousTotals'] = $this->previousTotals;
        }
        if ($this->adjustment !== null) {
            $payload['adjustment'] = $this->adjustment->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
