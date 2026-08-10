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

final class BudgetInput implements \JsonSerializable
{
    /**
     * @param list<BudgetThreshold> $thresholds
     * @param list<BudgetCostFilter>|null $filters
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference and AND-composed with `filters` when the budget is evaluated. Updates are full replaces, so omitting it on PUT clears it. A reference that fails to resolve errors the budget's evaluation rather than silently measuring all spend.
     * @param BudgetCostBasis::*|null $costBasis
     */
    public function __construct(
        public readonly string $name,
        public readonly int $amountCents,
        public readonly array $thresholds,
        public readonly ?string $currency = null,
        public readonly ?array $filters = null,
        public readonly ?string $savedFilterId = null,
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
            name: Coerce::toString($data['name'] ?? null),
            amountCents: Coerce::toInt($data['amountCents'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): BudgetThreshold => BudgetThreshold::fromArray(Coerce::toArray($item))),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BudgetCostFilter => BudgetCostFilter::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
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
