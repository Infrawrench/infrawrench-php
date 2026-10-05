<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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

final class AiProviderCoverage implements \JsonSerializable
{
    public function __construct(
        public readonly string $provider,
        public readonly string $currency,
        public readonly float $billedAmount,
        public readonly float $attributedAmount,
        public readonly float $unattributedAmount,
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
            provider: Coerce::toString($data['provider'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            billedAmount: Coerce::toFloat($data['billedAmount'] ?? null),
            attributedAmount: Coerce::toFloat($data['attributedAmount'] ?? null),
            unattributedAmount: Coerce::toFloat($data['unattributedAmount'] ?? null),
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
            'provider' => $this->provider,
            'currency' => $this->currency,
            'billedAmount' => $this->billedAmount,
            'attributedAmount' => $this->attributedAmount,
            'unattributedAmount' => $this->unattributedAmount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
