<?php

/*
 * infrawrench/sdk v0.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.22.0).
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
        public readonly string $month,
        public readonly int $actualCents,
        public readonly ?int $forecastCents,
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
            month: Coerce::toString($data['month'] ?? null),
            actualCents: Coerce::toInt($data['actualCents'] ?? null),
            forecastCents: Coerce::toIntOrNull($data['forecastCents'] ?? null),
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
            'month' => $this->month,
            'actualCents' => $this->actualCents,
            'forecastCents' => $this->forecastCents,
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
