<?php

/*
 * infrawrench/sdk v1.91.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.91.0).
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

final class CapacityCheckoutRequest implements \JsonSerializable
{
    /**
     * @param int|null $quantity Slots to buy. Defaults to 1. The buyer can still adjust it in Checkout.
     */
    public function __construct(
        public readonly ?int $quantity = null,
        public readonly ?RevnuCheckoutMeasurement $measurement = null,
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
            quantity: Coerce::toIntOrNull($data['quantity'] ?? null),
            measurement: Coerce::nullable($data['measurement'] ?? null, static fn (mixed $value): RevnuCheckoutMeasurement => RevnuCheckoutMeasurement::fromArray(Coerce::toArray($value))),
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
        ];
        if ($this->quantity !== null) {
            $payload['quantity'] = $this->quantity;
        }
        if ($this->measurement !== null) {
            $payload['measurement'] = $this->measurement->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
