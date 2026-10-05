<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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

final class PriceCatalogPrice implements \JsonSerializable
{
    /**
     * @param PriceRateType::* $rateType
     * @param 'hour'|'month'|'gb-month' $unit
     * @param float $amount Price per `unit` in `currency`, the provider's list price.
     * @param string|null $term Commitment term for reserved / savings plan: `1yr`, `3yr`.
     * @param string|null $effectiveDate When the provider says the rate took effect. Absent when the source does not say.
     */
    public function __construct(
        public readonly string $region,
        public readonly string $rateType,
        public readonly string $unit,
        public readonly float $amount,
        public readonly string $currency,
        public readonly ?string $term = null,
        public readonly ?string $paymentOption = null,
        public readonly ?string $effectiveDate = null,
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
            region: Coerce::toString($data['region'] ?? null),
            rateType: Coerce::toString($data['rateType'] ?? null),
            unit: Coerce::toString($data['unit'] ?? null),
            amount: Coerce::toFloat($data['amount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            term: Coerce::toStringOrNull($data['term'] ?? null),
            paymentOption: Coerce::toStringOrNull($data['paymentOption'] ?? null),
            effectiveDate: Coerce::toStringOrNull($data['effectiveDate'] ?? null),
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
            'region' => $this->region,
            'rateType' => $this->rateType,
            'unit' => $this->unit,
            'amount' => $this->amount,
            'currency' => $this->currency,
        ];
        if ($this->term !== null) {
            $payload['term'] = $this->term;
        }
        if ($this->paymentOption !== null) {
            $payload['paymentOption'] = $this->paymentOption;
        }
        if ($this->effectiveDate !== null) {
            $payload['effectiveDate'] = $this->effectiveDate;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
