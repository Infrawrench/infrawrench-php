<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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

final class BudgetWithStatus implements \JsonSerializable
{
    /**
     * @param list<BudgetCostFilter> $filters
     * @param list<BudgetThreshold> $thresholds
     * @param BudgetCostBasis::* $costBasis
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` when the budget is evaluated. Updates are full replaces, so omitting it on PUT clears it. A reference that fails to resolve errors the budget's evaluation rather than silently measuring all spend.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) this budget's **forecast** thresholds are measured against. Null — the default, and the value for every budget nobody deliberately opts in — keeps them on the bare trend. Opting in is per-budget on purpose: a hypothesis somebody typed into a form must not silently change when real people get paged. `actual` thresholds are never affected; they measure money already spent. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param string|null $scenarioModelName The opted-into model's name, so a card can say whose assumptions are in the number.
     * @param bool $useAdjustedSpend Measure this budget against billing-rule-adjusted spend — the internal figure — instead of what the providers charged. False by default, and for every budget nobody opted in. The default is a deliberate refusal: a markup is organisation policy and a budget threshold pages a real person, so adding one settings row must not be able to move every on-call rota at once. Unlike a scenario this affects `actual` thresholds too — an opted-in budget is measuring the internal number, and month-to-date internal spend is as marked up as the forecast is. The alert body says the figure is adjusted and names the collected one. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param int|null $rawActualCents Month-to-date **collected** spend, non-null only for a budget measuring adjusted spend. Null on an unadjusted budget rather than a copy of `actualCents`: "there is no separate collected figure because this one is it" and "the collected figure happens to equal the adjusted one" are different facts, and captioning every budget in the organisation would make the adjusted ones invisible.
     * @param int|null $forecastCents The **unadjusted trend** forecast, whether or not a scenario is applied — so both numbers are always comparable.
     * @param int|null $scenarioForecastCents The scenario-adjusted month forecast, set only for a budget that opted into a model, and the number its forecast thresholds are judged against. Null means the thresholds used `forecastCents`.
     * @param list<array{id: string, thresholdType: 'actual'|'forecast', thresholdPercent: int, triggeredAt: string}> $currentMonthEvents
     * @param list<array{widgetId: string, dashboardId: string, dashboardName: string}> $placements
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int $amountCents,
        public readonly string $currency,
        public readonly array $filters,
        public readonly array $thresholds,
        public readonly string $costBasis,
        public readonly ?string $savedFilterId,
        public readonly ?string $scenarioModelId,
        public readonly ?string $scenarioModelName,
        public readonly bool $useAdjustedSpend,
        public readonly ?int $rawActualCents,
        public readonly string $month,
        public readonly int $actualCents,
        public readonly ?int $forecastCents,
        public readonly ?int $scenarioForecastCents,
        public readonly array $currentMonthEvents,
        public readonly array $placements,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            amountCents: Coerce::toInt($data['amountCents'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            filters: Coerce::mapList($data['filters'] ?? null, static fn (mixed $item): BudgetCostFilter => BudgetCostFilter::fromArray(Coerce::toArray($item))),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            scenarioModelName: Coerce::toStringOrNull($data['scenarioModelName'] ?? null),
            useAdjustedSpend: Coerce::toBool($data['useAdjustedSpend'] ?? null),
            rawActualCents: Coerce::toIntOrNull($data['rawActualCents'] ?? null),
            month: Coerce::toString($data['month'] ?? null),
            actualCents: Coerce::toInt($data['actualCents'] ?? null),
            forecastCents: Coerce::toIntOrNull($data['forecastCents'] ?? null),
            scenarioForecastCents: Coerce::toIntOrNull($data['scenarioForecastCents'] ?? null),
            currentMonthEvents: Coerce::mapList($data['currentMonthEvents'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            placements: Coerce::mapList($data['placements'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'id' => $this->id,
            'name' => $this->name,
            'amountCents' => $this->amountCents,
            'currency' => $this->currency,
            'filters' => array_map(static fn (BudgetCostFilter $item): array => $item->toArray(), $this->filters),
            'thresholds' => array_map(static fn (BudgetThreshold $item): array => $item->toArray(), $this->thresholds),
            'costBasis' => $this->costBasis,
            'savedFilterId' => $this->savedFilterId,
            'scenarioModelId' => $this->scenarioModelId,
            'scenarioModelName' => $this->scenarioModelName,
            'useAdjustedSpend' => $this->useAdjustedSpend,
            'rawActualCents' => $this->rawActualCents,
            'month' => $this->month,
            'actualCents' => $this->actualCents,
            'forecastCents' => $this->forecastCents,
            'scenarioForecastCents' => $this->scenarioForecastCents,
            'currentMonthEvents' => $this->currentMonthEvents,
            'placements' => $this->placements,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
