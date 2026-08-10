<?php

/*
 * infrawrench/sdk v1.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.4.0).
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

final class CostEstimateLineItem implements \JsonSerializable
{
    public function __construct(
        public readonly string $label,
        public readonly float $monthlyAmount,
        public readonly ?string $detail = null,
        public readonly ?float $quantity = null,
        public readonly ?string $unit = null,
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
            label: Coerce::toString($data['label'] ?? null),
            monthlyAmount: Coerce::toFloat($data['monthlyAmount'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            quantity: Coerce::toFloatOrNull($data['quantity'] ?? null),
            unit: Coerce::toStringOrNull($data['unit'] ?? null),
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
            'label' => $this->label,
            'monthlyAmount' => $this->monthlyAmount,
        ];
        if ($this->detail !== null) {
            $payload['detail'] = $this->detail;
        }
        if ($this->quantity !== null) {
            $payload['quantity'] = $this->quantity;
        }
        if ($this->unit !== null) {
            $payload['unit'] = $this->unit;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
