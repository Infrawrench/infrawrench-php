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

final class ExchangeRate implements \JsonSerializable
{
    /**
     * @param string $fromCurrency ISO 4217 code, upper-case.
     * @param string $toCurrency ISO 4217 code, upper-case.
     * @param string $rate Multiply an amount in `fromCurrency` by this to get `toCurrency`. A decimal **string**, not a number: it is stored in a `numeric(20, 10)` column so the digits your finance system used survive the round trip exactly, and a JSON number could not promise that.
     * @param string $effectiveFrom Inclusive day this rate starts applying. A given day converts at the rate with the greatest `effectiveFrom` on or before it, so historical periods keep the rate that applied then. A day earlier than every stated rate has no rate.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $fromCurrency,
        public readonly string $toCurrency,
        public readonly string $rate,
        public readonly string $effectiveFrom,
        public readonly ?string $createdBy,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            fromCurrency: Coerce::toString($data['fromCurrency'] ?? null),
            toCurrency: Coerce::toString($data['toCurrency'] ?? null),
            rate: Coerce::toString($data['rate'] ?? null),
            effectiveFrom: Coerce::toString($data['effectiveFrom'] ?? null),
            createdBy: Coerce::toStringOrNull($data['createdBy'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'fromCurrency' => $this->fromCurrency,
            'toCurrency' => $this->toCurrency,
            'rate' => $this->rate,
            'effectiveFrom' => $this->effectiveFrom,
            'createdBy' => $this->createdBy,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
