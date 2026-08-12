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
 * **Null for a draft** — null, not zero. A draft's figures are recomputed on read and the list
 * does not recompute; fetch the invoice by id for a draft's current numbers.
 *
 * The API may send `null` in place of this object.
 */
final class InvoiceTotals implements \JsonSerializable
{
    /**
     * @param array<string, float> $collected Currency code → amount in the currency's major unit.
     * @param array<string, float> $adjustment Currency code → amount in the currency's major unit.
     * @param array<string, float> $adjusted Currency code → amount in the currency's major unit.
     * @param array<string, float> $billed Keyed by the invoice currency, plus any currency that could not be converted — which keeps its own key so the total is never quietly short.
     */
    public function __construct(
        public readonly array $collected,
        public readonly array $adjustment,
        public readonly array $adjusted,
        public readonly array $billed,
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
            collected: Coerce::mapValues($data['collected'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            adjustment: Coerce::mapValues($data['adjustment'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            adjusted: Coerce::mapValues($data['adjusted'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            billed: Coerce::mapValues($data['billed'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
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
            'collected' => $this->collected,
            'adjustment' => $this->adjustment,
            'adjusted' => $this->adjusted,
            'billed' => $this->billed,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
