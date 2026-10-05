<?php

/*
 * infrawrench/sdk v1.59.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.59.0).
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

final class BudgetInput implements \JsonSerializable
{
    /**
     * @param list<BudgetThreshold> $thresholds
     * @param int|null $amountCents The limit per period of a spend budget, in minor units of `currency`. Required (and positive) for a spend budget unless `period` is an explicit list; ignored by a usage budget. Defaults to 0.
     * @param list<BudgetCostFilter>|null $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` when the budget is evaluated. Updates are full replaces, so omitting it on PUT clears it. A reference that fails to resolve errors the budget's evaluation rather than silently measuring all spend.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) this budget's **forecast** thresholds are measured against. Null — the default, and the value for every budget nobody deliberately opts in — keeps them on the bare trend. Opting in is per-budget on purpose: a hypothesis somebody typed into a form must not silently change when real people get paged. `actual` thresholds are never affected; they measure money already spent. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param BudgetCostBasis::*|null $costBasis
     * @param bool|null $useAdjustedSpend Measure this budget against billing-rule-adjusted spend — the internal figure — instead of what the providers charged. False by default, and for every budget nobody opted in. The default is a deliberate refusal: a markup is organisation policy and a budget threshold pages a real person, so adding one settings row must not be able to move every on-call rota at once. Unlike a scenario this affects `actual` thresholds too — an opted-in budget is measuring the internal number, and month-to-date internal spend is as marked up as the forecast is. The alert body says the figure is adjusted and names the collected one. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param BudgetMeasure::*|null $measure
     * @param string|null $usageUnit The usage unit a usage budget counts, exactly as the providers report it.
     * @param float|null $usageAmount A usage budget's limit per period, in `usageUnit`.
     * @param string|null $parentBudgetId The budget this one rolls up into. A parent's actual and forecast are the sum of its children's, each measured over the parent's period; parent and children must count the same thing (one currency, or one usage unit). Hierarchies are at most 4 levels deep. Deleting a budget moves its children up to its own parent. Updates are full replaces, so omitting it on PUT makes the budget a root.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $thresholds,
        public readonly ?int $amountCents = null,
        public readonly ?string $currency = null,
        public readonly ?array $filters = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?string $scenarioModelId = null,
        public readonly ?string $costBasis = null,
        public readonly ?bool $useAdjustedSpend = null,
        public readonly ?string $measure = null,
        public readonly ?string $usageUnit = null,
        public readonly ?float $usageAmount = null,
        public readonly mixed $period = null,
        public readonly ?string $parentBudgetId = null,
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
            name: Coerce::toString($data['name'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            amountCents: Coerce::toIntOrNull($data['amountCents'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BudgetCostFilter => BudgetCostFilter::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            useAdjustedSpend: Coerce::toBoolOrNull($data['useAdjustedSpend'] ?? null),
            measure: Coerce::toStringOrNull($data['measure'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
            usageAmount: Coerce::toFloatOrNull($data['usageAmount'] ?? null),
            period: $data['period'] ?? null,
            parentBudgetId: Coerce::toStringOrNull($data['parentBudgetId'] ?? null),
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
            'name' => $this->name,
            'thresholds' => array_map(static fn (BudgetThreshold $item): array => $item->toArray(), $this->thresholds),
        ];
        if ($this->amountCents !== null) {
            $payload['amountCents'] = $this->amountCents;
        }
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (BudgetCostFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }
        if ($this->scenarioModelId !== null) {
            $payload['scenarioModelId'] = $this->scenarioModelId;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }
        if ($this->useAdjustedSpend !== null) {
            $payload['useAdjustedSpend'] = $this->useAdjustedSpend;
        }
        if ($this->measure !== null) {
            $payload['measure'] = $this->measure;
        }
        if ($this->usageUnit !== null) {
            $payload['usageUnit'] = $this->usageUnit;
        }
        if ($this->usageAmount !== null) {
            $payload['usageAmount'] = $this->usageAmount;
        }
        if ($this->period !== null) {
            $payload['period'] = $this->period;
        }
        if ($this->parentBudgetId !== null) {
            $payload['parentBudgetId'] = $this->parentBudgetId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
