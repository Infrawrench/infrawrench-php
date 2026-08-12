<?php

/*
 * infrawrench/sdk v1.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.16.0).
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

/**
 * What an adjusted answer did. Present whenever the request asked to be adjusted, even for an
 * organisation with no rules — its absence means, and can only mean, that every figure in the
 * response is exactly what the providers charged.
 */
final class CostAdjustmentSummary implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, kind: 'percentage'|'fixed'|'reallocation', summary: string}> $rules The enabled rules in force for this answer, in evaluation order.
     * @param array<string, float> $rawTotals The collected, unadjusted totals for exactly the same rows, summed in the same scan. Always present on an adjusted answer — this is the figure that reconciles against an invoice. Per-series raw figures are deliberately not offered: after a reallocation the series are a different partition of the same money.
     * @param array<string, float> $fixedTotals Fixed-amount charges over the period, pro-rated. On a cost query these are reported here and **not** folded into `totals`, which stays the sum of the series; the figure an organisation reports internally is the adjusted total plus this. On a showback report they are additionally booked onto the cost centre the rule names.
     */
    public function __construct(
        public readonly array $rules,
        public readonly array $rawTotals,
        public readonly array $fixedTotals,
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
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            rawTotals: Coerce::mapValues($data['rawTotals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            fixedTotals: Coerce::mapValues($data['fixedTotals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
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
            'rules' => $this->rules,
            'rawTotals' => $this->rawTotals,
            'fixedTotals' => $this->fixedTotals,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
