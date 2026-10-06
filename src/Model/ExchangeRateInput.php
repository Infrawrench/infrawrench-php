<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class ExchangeRateInput implements \JsonSerializable
{
    /**
     * @param string $fromCurrency ISO 4217 code, upper-case.
     * @param string $toCurrency ISO 4217 code, upper-case.
     * @param string $rate Multiply an amount in `fromCurrency` by this to get `toCurrency`. A decimal **string**, not a number: it is stored in a `numeric(20, 10)` column so the digits your finance system used survive the round trip exactly, and a JSON number could not promise that.
     * @param string|null $effectiveTo Omitted or `null` for open-ended. Must not be before `effectiveFrom`.
     */
    public function __construct(
        public readonly string $fromCurrency,
        public readonly string $toCurrency,
        public readonly string $rate,
        public readonly string $effectiveFrom,
        public readonly ?string $effectiveTo = null,
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
            fromCurrency: Coerce::toString($data['fromCurrency'] ?? null),
            toCurrency: Coerce::toString($data['toCurrency'] ?? null),
            rate: Coerce::toString($data['rate'] ?? null),
            effectiveFrom: Coerce::toString($data['effectiveFrom'] ?? null),
            effectiveTo: Coerce::toStringOrNull($data['effectiveTo'] ?? null),
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
            'fromCurrency' => $this->fromCurrency,
            'toCurrency' => $this->toCurrency,
            'rate' => $this->rate,
            'effectiveFrom' => $this->effectiveFrom,
        ];
        if ($this->effectiveTo !== null) {
            $payload['effectiveTo'] = $this->effectiveTo;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
