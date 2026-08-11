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

final class CostScenarioAdjustment implements \JsonSerializable
{
    /**
     * @param string $id Stable within the model; also the key of its per-adjustment total.
     * @param string $label What this adjustment is. Named on the chart whenever the scenario moves a number.
     * @param 'one_off'|'recurring'|'rate_change' $kind `one_off` is a single amount on a single day; `recurring` is an amount every period from a date; `rate_change` is ±X% of the trend from a date. The split between an amount and a percentage of the trend is what fixes the composition order — see the `scenario` field on the cost query response.
     * @param string|null $endDate Inclusive last day, or null for indefinitely. Refused for `one_off`, which is one day.
     * @param int|null $amountCents Minor units of the model's currency, for the amount kinds; null for `rate_change`. May be negative — turning off an old cluster is as real a known future cost as buying a new one.
     * @param string|null $currency Always the model's own currency; a model that held two would sum two kinds of money.
     * @param 'daily'|'monthly'|null $period How often a `recurring` amount charges. A monthly amount is spread evenly across each calendar month it covers rather than landing as a spike on the 1st, so a month the scenario only partly covers costs proportionally less.
     * @param float|null $percent Percent change to the trend, for `rate_change`. -20 is a fifth cheaper.
     * @param list<CostScenarioScopeTerm> $scope Which spend this adjustment describes; empty is the whole organization. For a rate change the scope is what the percentage is *of*. For an amount it decides whether the adjustment applies to a given chart at all — a GCP commitment does not belong on a chart filtered to AWS, and one that is excluded is named in `scenario.outOfScope`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly string $kind,
        public readonly string $startDate,
        public readonly ?string $endDate,
        public readonly ?int $amountCents,
        public readonly ?string $currency,
        public readonly ?string $period,
        public readonly ?float $percent,
        public readonly array $scope,
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
            label: Coerce::toString($data['label'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            startDate: Coerce::toString($data['startDate'] ?? null),
            endDate: Coerce::toStringOrNull($data['endDate'] ?? null),
            amountCents: Coerce::toIntOrNull($data['amountCents'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            period: Coerce::toStringOrNull($data['period'] ?? null),
            percent: Coerce::toFloatOrNull($data['percent'] ?? null),
            scope: Coerce::mapList($data['scope'] ?? null, static fn (mixed $item): CostScenarioScopeTerm => CostScenarioScopeTerm::fromArray(Coerce::toArray($item))),
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
            'label' => $this->label,
            'kind' => $this->kind,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'amountCents' => $this->amountCents,
            'currency' => $this->currency,
            'period' => $this->period,
            'percent' => $this->percent,
            'scope' => array_map(static fn (CostScenarioScopeTerm $item): array => $item->toArray(), $this->scope),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
