<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class BudgetFull implements \JsonSerializable
{
    /**
     * @param list<BudgetCostFilter> $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` when the budget is evaluated. Updates are full replaces, so omitting it on PUT clears it. A reference that fails to resolve errors the budget's evaluation rather than silently measuring all spend.
     * @param string|null $scenarioModelId A scenario model (see /cost-scenarios) this budget's **forecast** thresholds are measured against. Null — the default, and the value for every budget nobody deliberately opts in — keeps them on the bare trend. Opting in is per-budget on purpose: a hypothesis somebody typed into a form must not silently change when real people get paged. `actual` thresholds are never affected; they measure money already spent. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param list<BudgetThreshold> $thresholds
     * @param BudgetCostBasis::* $costBasis
     * @param bool $useAdjustedSpend Measure this budget against billing-rule-adjusted spend — the internal figure — instead of what the providers charged. False by default, and for every budget nobody opted in. The default is a deliberate refusal: a markup is organisation policy and a budget threshold pages a real person, so adding one settings row must not be able to move every on-call rota at once. Unlike a scenario this affects `actual` thresholds too — an opted-in budget is measuring the internal number, and month-to-date internal spend is as marked up as the forecast is. The alert body says the figure is adjusted and names the collected one. Updates are full replaces, so omitting it on PUT clears the opt-in.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $name,
        public readonly int $amountCents,
        public readonly string $currency,
        public readonly array $filters,
        public readonly ?string $savedFilterId,
        public readonly ?string $scenarioModelId,
        public readonly array $thresholds,
        public readonly string $costBasis,
        public readonly bool $useAdjustedSpend,
        public readonly ?string $createdByUserId,
        public readonly ?string $deletedAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            amountCents: Coerce::toInt($data['amountCents'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            filters: Coerce::mapList($data['filters'] ?? null, static fn (mixed $item): BudgetCostFilter => BudgetCostFilter::fromArray(Coerce::toArray($item))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            useAdjustedSpend: Coerce::toBool($data['useAdjustedSpend'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            deletedAt: Coerce::toStringOrNull($data['deletedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'organizationId' => $this->organizationId,
            'name' => $this->name,
            'amountCents' => $this->amountCents,
            'currency' => $this->currency,
            'filters' => array_map(static fn (BudgetCostFilter $item): array => $item->toArray(), $this->filters),
            'savedFilterId' => $this->savedFilterId,
            'scenarioModelId' => $this->scenarioModelId,
            'thresholds' => array_map(static fn (BudgetThreshold $item): array => $item->toArray(), $this->thresholds),
            'costBasis' => $this->costBasis,
            'useAdjustedSpend' => $this->useAdjustedSpend,
            'createdByUserId' => $this->createdByUserId,
            'deletedAt' => $this->deletedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
