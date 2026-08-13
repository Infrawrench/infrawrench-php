<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
 * One scope entry in one collected currency. Two currencies for one cost centre are two lines, not
 * one blended line, because the conversion is a separately reconcilable step.
 */
final class InvoiceLine implements \JsonSerializable
{
    /**
     * @param 'cost_centre'|'account'|'fixed' $kind
     * @param string|null $refId Cost-centre id, account id, or null for an org-level fixed charge.
     * @param string $label The name at issue time, frozen with the numbers — renaming a cost centre in March must not retitle a line on January's invoice.
     * @param string $currency The currency the providers billed in.
     * @param float $collected What the providers charged for this scope, before any billing rule.
     * @param float $adjustment What the organisation's billing rules added or removed.
     * @param float $adjusted `collected + adjustment`.
     * @param float|null $rate The rate applied to reach `billed`. 1 when the line is already in the invoice currency; null when the organisation has stated no rate for this currency, in which case the amount is carried in its own currency rather than dropped or invented.
     * @param float|null $billed `adjusted × rate`, in the invoice currency.
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $refId,
        public readonly string $label,
        public readonly string $currency,
        public readonly float $collected,
        public readonly float $adjustment,
        public readonly float $adjusted,
        public readonly ?float $rate,
        public readonly ?float $billed,
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
            kind: Coerce::toString($data['kind'] ?? null),
            refId: Coerce::toStringOrNull($data['refId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            collected: Coerce::toFloat($data['collected'] ?? null),
            adjustment: Coerce::toFloat($data['adjustment'] ?? null),
            adjusted: Coerce::toFloat($data['adjusted'] ?? null),
            rate: Coerce::toFloatOrNull($data['rate'] ?? null),
            billed: Coerce::toFloatOrNull($data['billed'] ?? null),
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
            'kind' => $this->kind,
            'refId' => $this->refId,
            'label' => $this->label,
            'currency' => $this->currency,
            'collected' => $this->collected,
            'adjustment' => $this->adjustment,
            'adjusted' => $this->adjusted,
            'rate' => $this->rate,
            'billed' => $this->billed,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
