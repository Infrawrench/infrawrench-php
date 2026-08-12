<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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
 * Best-effort trailing spend matched from collected per-resource cost rows; null when the provider
 * reports no per-resource cost. The flag itself never depends on billing data.
 *
 * The API may send `null` in place of this object.
 */
final class OrphanCostAnnotation implements \JsonSerializable
{
    /** @param float $amount Spend over the trailing cost window. */
    public function __construct(
        public readonly float $amount,
        public readonly string $currency,
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
            amount: Coerce::toFloat($data['amount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
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
            'amount' => $this->amount,
            'currency' => $this->currency,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
