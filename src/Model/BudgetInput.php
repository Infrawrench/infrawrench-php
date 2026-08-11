<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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
     * @param list<BudgetCostFilter>|null $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` when the budget is evaluated. Updates are full replaces, so omitting it on PUT clears it. A reference that fails to resolve errors the budget's evaluation rather than silently measuring all spend.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) this budget's **forecast** thresholds are measured against. Null — the default, and the value for every budget nobody deliberately opts in — keeps them on the bare trend. Opting in is per-budget on purpose: a hypothesis somebody typed into a form must not silently change when real people get paged. `actual` thresholds are never affected; they measure money already spent. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param BudgetCostBasis::*|null $costBasis
     * @param bool|null $useAdjustedSpend Measure this budget against billing-rule-adjusted spend — the internal figure — instead of what the providers charged. False by default, and for every budget nobody opted in. The default is a deliberate refusal: a markup is organisation policy and a budget threshold pages a real person, so adding one settings row must not be able to move every on-call rota at once. Unlike a scenario this affects `actual` thresholds too — an opted-in budget is measuring the internal number, and month-to-date internal spend is as marked up as the forecast is. The alert body says the figure is adjusted and names the collected one. Updates are full replaces, so omitting it on PUT clears the opt-in.
     */
    public function __construct(
        public readonly string $name,
        public readonly int $amountCents,
        public readonly array $thresholds,
        public readonly ?string $currency = null,
        public readonly ?array $filters = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?string $scenarioModelId = null,
        public readonly ?string $costBasis = null,
        public readonly ?bool $useAdjustedSpend = null,
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
            amountCents: Coerce::toInt($data['amountCents'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BudgetCostFilter => BudgetCostFilter::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            useAdjustedSpend: Coerce::toBoolOrNull($data['useAdjustedSpend'] ?? null),
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
            'amountCents' => $this->amountCents,
            'thresholds' => array_map(static fn (BudgetThreshold $item): array => $item->toArray(), $this->thresholds),
        ];
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

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
