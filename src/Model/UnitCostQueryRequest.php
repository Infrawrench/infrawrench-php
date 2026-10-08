<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
     * @param 'hourly'|'daily'|'weekly'|'monthly'|'quarterly'|'cumulative' $binning
     * @param UnitCostMode::*|null $mode
     * @param list<UnitCostLabelFilter>|null $labelFilters Keep only values carrying these labels. In a ratio mode each label must be mapped, and the spend is narrowed to the same values on the mapped dimension.
     * @param string|null $groupByLabel One series per value of this label (the 25 largest by metric total; the rest fold into `Other`). In a ratio mode the label must be mapped.
     * @param string|null $usageUnit `usage_unit_cost` only, and required there: the provider usage unit to divide by. See `GET /business-metrics/usage-units`.
     * @param list<BusinessMetricScopeTerm>|null $filters Narrowing on top of the metric's own `costScope`: AND-composed, never a replacement.
     * @param string|null $query The same narrowing as cost-query-language text.
     * @param 'cash'|'amortized'|'blended'|null $costBasis
     * @param list<string>|null $chargeTypes
     * @param string|null $displayCurrency Fold spend currencies the organization holds a rate for into this one before dividing. Ignored for `margin`, which always converts to the metric's own currency.
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $binning,
        public readonly ?string $mode = null,
        public readonly ?float $scale = null,
        public readonly ?array $labelFilters = null,
        public readonly ?string $groupByLabel = null,
        public readonly ?string $usageUnit = null,
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
            scale: Coerce::toFloatOrNull($data['scale'] ?? null),
            labelFilters: Coerce::nullable($data['labelFilters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): UnitCostLabelFilter => UnitCostLabelFilter::fromArray(Coerce::toArray($item)))),
            groupByLabel: Coerce::toStringOrNull($data['groupByLabel'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
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
        if ($this->scale !== null) {
            $payload['scale'] = $this->scale;
        }
        if ($this->labelFilters !== null) {
            $payload['labelFilters'] = array_map(static fn (UnitCostLabelFilter $item): array => $item->toArray(), $this->labelFilters);
        }
        if ($this->groupByLabel !== null) {
            $payload['groupByLabel'] = $this->groupByLabel;
        }
        if ($this->usageUnit !== null) {
            $payload['usageUnit'] = $this->usageUnit;
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
