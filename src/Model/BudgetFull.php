<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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
     * @param list<BudgetThreshold> $thresholds
     * @param BudgetCostBasis::* $costBasis Which number the budget tracks. Defaults to `cash`: what the provider charged, when it charged it. An organization holding reservations or savings plans usually wants `amortized`: a cash budget is blown the month a commitment is bought and then reads as under-spent for the rest of the term it paid for. `blended` additionally spreads each commitment's discount evenly over all the usage it could cover, which is the fair basis for a team's budget when commitments are bought centrally.
     * @param bool $useAdjustedSpend Measure this budget against billing-rule-adjusted spend (the internal figure) instead of what the providers charged. False by default, and for every budget nobody opted in. The default is a deliberate refusal: a markup is organisation policy and a budget threshold pages a real person, so adding one settings row must not be able to move every on-call rota at once. Unlike a scenario this affects `actual` thresholds too; an opted-in budget is measuring the internal number, and month-to-date internal spend is as marked up as the forecast is. The alert body says the figure is adjusted and names the collected one. Updates are full replaces, so omitting it on PUT clears the opt-in.
     * @param BudgetMeasure::* $measure
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
        public readonly AlertEmailRecipients $emailRecipients,
        public readonly ?string $createdByUserId,
        public readonly ?string $deletedAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $measure,
        public readonly ?string $usageUnit,
        public readonly ?float $usageAmount,
        public readonly BudgetRecurringPeriod|BudgetExplicitPeriods|null $period,
        public readonly ?string $parentBudgetId,
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
            emailRecipients: AlertEmailRecipients::fromArray(Coerce::toArray($data['emailRecipients'] ?? null)),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            deletedAt: Coerce::toStringOrNull($data['deletedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            measure: Coerce::toString($data['measure'] ?? null),
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
            'emailRecipients' => $this->emailRecipients->toArray(),
            'createdByUserId' => $this->createdByUserId,
            'deletedAt' => $this->deletedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'measure' => $this->measure,
            'usageUnit' => $this->usageUnit,
            'usageAmount' => $this->usageAmount,
            'period' => $this->period,
            'parentBudgetId' => $this->parentBudgetId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
