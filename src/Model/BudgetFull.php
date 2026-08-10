<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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
     * @param list<BudgetThreshold> $thresholds
     * @param BudgetCostBasis::* $costBasis
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $name,
        public readonly int $amountCents,
        public readonly string $currency,
        public readonly array $filters,
        public readonly ?string $savedFilterId,
        public readonly array $thresholds,
        public readonly string $costBasis,
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
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
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
            'thresholds' => array_map(static fn (BudgetThreshold $item): array => $item->toArray(), $this->thresholds),
            'costBasis' => $this->costBasis,
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
