<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class CostQueryRequest implements \JsonSerializable
{
    /**
     * @param 'daily'|'weekly'|'monthly'|'cumulative' $binning
     * @param list<CostFilter>|null $filters
     * @param string|null $query The same filter written as text, in the cost query language — an alternative to `filters`, compiled server-side into exactly that structure.

Grammar: a conjunction of equality terms joined by `AND`. A term is `dimension = 'value'`, `dimension != 'value'`, `dimension IN ('a','b')` or `dimension NOT IN ('a','b')`; the tag dimension takes its key in brackets, `tag['owner'] = 'platform'`. Keywords are case-insensitive, strings may be single- or double-quoted, and a quote inside a value is escaped by doubling it (`'it''s'`) or with a backslash (`'it\'s'`).

`OR` is deliberately not supported: the stored filter is a conjunction, so several values of one dimension go in an `IN` list and unrelated alternatives need separate queries. Anything the structured filter cannot express is a parse error rather than a second execution path.

Sending both `query` and a non-empty `filters` is a 400, not a precedence rule. A parse failure is a 400 whose body carries `queryError` with the character `offset`, the `length` of the offending span, and the `expected` alternatives there.
     * @param string|null $savedFilterId A saved cost filter (see /saved-cost-filters) applied by reference. Resolved server-side at query time and AND-composed with whichever of `filters`/`query` is present — unlike those two it is a composition, not an alternative. An id that does not resolve to a live filter is a 400; the query is never silently run unfiltered.
     * @param string|null $scenarioModelId Apply a scenario model (see /cost-scenarios) to the projection: known future cost the trend cannot see. Requires `forecast: true` — sending it without one is a 400, not a no-op, because a caller who asked for assumptions and silently got none back is the failure this feature exists to prevent. The adjusted projection comes back as `scenario`, **alongside** the untouched `forecast`, never instead of it. An id that does not resolve is a 400.
     * @param CostBasis::*|null $costBasis
     * @param list<CostChargeType::*>|null $chargeTypes Restrict to these kinds of charge. Omitted is all of them, which is what makes an unfiltered total net rather than gross — credits, refunds and commitment discounts are included. Rows collected before charge types existed, and rows from providers that cannot distinguish them, are `usage`.
     * @param bool|null $adjusted Apply the organization's billing rules (see /billing-rules) — markups, discounts, reallocations. Omitted (the default, and what every unattended reader sends) is raw collected spend. Present, the response carries `adjustment` with the collected totals beside the adjusted ones and the rules that moved them; it is set even for an organization with no rules, because the absence of that field is the only signal that a figure is unadjusted.
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $binning,
        public readonly string $groupBy,
        public readonly ?string $groupByTagKey = null,
        public readonly ?array $filters = null,
        public readonly ?string $query = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?int $topN = null,
        public readonly ?bool $comparePreviousPeriod = null,
        public readonly ?bool $forecast = null,
        public readonly ?string $scenarioModelId = null,
        public readonly ?string $costBasis = null,
        public readonly ?array $chargeTypes = null,
        public readonly ?bool $adjusted = null,
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
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostFilter => CostFilter::fromArray(Coerce::toArray($item)))),
            query: Coerce::toStringOrNull($data['query'] ?? null),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            topN: Coerce::toIntOrNull($data['topN'] ?? null),
            comparePreviousPeriod: Coerce::toBoolOrNull($data['comparePreviousPeriod'] ?? null),
            forecast: Coerce::toBoolOrNull($data['forecast'] ?? null),
            scenarioModelId: Coerce::toStringOrNull($data['scenarioModelId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            chargeTypes: Coerce::nullable($data['chargeTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            adjusted: Coerce::toBoolOrNull($data['adjusted'] ?? null),
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
            'groupBy' => $this->groupBy,
        ];
        if ($this->groupByTagKey !== null) {
            $payload['groupByTagKey'] = $this->groupByTagKey;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (CostFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }
        if ($this->topN !== null) {
            $payload['topN'] = $this->topN;
        }
        if ($this->comparePreviousPeriod !== null) {
            $payload['comparePreviousPeriod'] = $this->comparePreviousPeriod;
        }
        if ($this->forecast !== null) {
            $payload['forecast'] = $this->forecast;
        }
        if ($this->scenarioModelId !== null) {
            $payload['scenarioModelId'] = $this->scenarioModelId;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }
        if ($this->chargeTypes !== null) {
            $payload['chargeTypes'] = $this->chargeTypes;
        }
        if ($this->adjusted !== null) {
            $payload['adjusted'] = $this->adjusted;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
