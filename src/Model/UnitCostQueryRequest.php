<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class UnitCostQueryRequest implements \JsonSerializable
{
    /**
     * @param string $from Inclusive, YYYY-MM-DD.
     * @param 'daily'|'weekly'|'monthly'|'cumulative' $binning
     * @param 'unit_cost'|'margin'|null $mode Absent is `unit_cost` (spend ÷ metric value). `margin` is `(revenue − spend) ÷ revenue` as a fraction, and is a 400 for a metric whose `kind` is not `currency`.
     * @param list<BusinessMetricScopeTerm>|null $filters Narrowing on top of the metric's own `costScope` — AND-composed, never a replacement.
     * @param string|null $query The same narrowing as cost-query-language text.
     * @param 'cash'|'amortized'|null $costBasis
     * @param list<string>|null $chargeTypes
     * @param string|null $displayCurrency Fold spend currencies the organization holds a rate for into this one before dividing. Ignored for `margin`, which always converts to the metric's own currency.
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $binning,
        public readonly ?string $mode = null,
        public readonly ?array $filters = null,
        public readonly ?string $query = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?string $costBasis = null,
        public readonly ?array $chargeTypes = null,
        public readonly ?string $displayCurrency = null,
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
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            binning: Coerce::toString($data['binning'] ?? null),
            mode: Coerce::toStringOrNull($data['mode'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BusinessMetricScopeTerm => BusinessMetricScopeTerm::fromArray(Coerce::toArray($item)))),
            query: Coerce::toStringOrNull($data['query'] ?? null),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            chargeTypes: Coerce::nullable($data['chargeTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
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
            'from' => $this->from,
            'to' => $this->to,
            'binning' => $this->binning,
        ];
        if ($this->mode !== null) {
            $payload['mode'] = $this->mode;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (BusinessMetricScopeTerm $item): array => $item->toArray(), $this->filters);
        }
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }
        if ($this->chargeTypes !== null) {
            $payload['chargeTypes'] = $this->chargeTypes;
        }
        if ($this->displayCurrency !== null) {
            $payload['displayCurrency'] = $this->displayCurrency;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
