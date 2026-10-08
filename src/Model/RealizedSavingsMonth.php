<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class RealizedSavingsMonth implements \JsonSerializable
{
    /**
     * @param string $month YYYY-MM
     * @param float $realized Currency units (not cents), in the row's currency.
     * @param float $projected Currency units (not cents), in the row's currency.
     */
    public function __construct(
        public readonly string $month,
        public readonly string $currency,
        public readonly float $realized,
        public readonly float $projected,
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
            month: Coerce::toString($data['month'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            realized: Coerce::toFloat($data['realized'] ?? null),
            projected: Coerce::toFloat($data['projected'] ?? null),
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
            'month' => $this->month,
            'currency' => $this->currency,
            'realized' => $this->realized,
            'projected' => $this->projected,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
