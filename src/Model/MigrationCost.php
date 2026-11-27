<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class MigrationCost implements \JsonSerializable
{
    /**
     * @param float $amount Per month (730 hours).
     * @param 'billed'|'estimate'|'list-price' $basis `billed`: the resource's own spend in collected cost data over the last 30 days, scaled to 730 hours. `estimate`: the plugin's estimate for the configuration. `list-price`: the size's published list price times the count.
     * @param bool $partial Only part of the resource could be priced; the true figure is higher.
     */
    public function __construct(
        public readonly float $amount,
        public readonly string $currency,
        public readonly string $basis,
        public readonly bool $partial,
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
            basis: Coerce::toString($data['basis'] ?? null),
            partial: Coerce::toBool($data['partial'] ?? null),
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
            'basis' => $this->basis,
            'partial' => $this->partial,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
