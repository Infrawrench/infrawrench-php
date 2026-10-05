<?php

/*
 * infrawrench/sdk v1.60.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.60.0).
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
 * Provider discounts: `commitment_discount` lines and negative `other`/`adjustment` lines
 * (enterprise agreements, private pricing, Savings Plan negation).
 */
final class DiscountTreatment implements \JsonSerializable
{
    /**
     * @param 'pass_through'|'partial'|'retain' $mode
     * @param float|null $passThroughPercent `partial` only: the share the customer receives, strictly between 0 and 100.
     */
    public function __construct(
        public readonly string $mode,
        public readonly ?float $passThroughPercent = null,
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
            mode: Coerce::toString($data['mode'] ?? null),
            passThroughPercent: Coerce::toFloatOrNull($data['passThroughPercent'] ?? null),
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
            'mode' => $this->mode,
        ];
        if ($this->passThroughPercent !== null) {
            $payload['passThroughPercent'] = $this->passThroughPercent;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
