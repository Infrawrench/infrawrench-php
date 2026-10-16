<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
 * Monthly figure at the provider's published list price, for idle rows a plugin could price. An
 * estimate: show it only when `cost` (billed spend) is null.
 *
 * The API may send `null` in place of this object.
 */
final class IdleSavingsEstimate implements \JsonSerializable
{
    /**
     * @param float $monthlyAmount Monthly figure at the provider's published rate.
     * @param 'list-price' $basis
     * @param string|null $note Caveat shown beside the figure.
     */
    public function __construct(
        public readonly float $monthlyAmount,
        public readonly string $currency,
        public readonly string $basis,
        public readonly ?string $note = null,
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
            monthlyAmount: Coerce::toFloat($data['monthlyAmount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            basis: Coerce::toString($data['basis'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
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
            'monthlyAmount' => $this->monthlyAmount,
            'currency' => $this->currency,
            'basis' => $this->basis,
        ];
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
