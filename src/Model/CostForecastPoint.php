<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class CostForecastPoint implements \JsonSerializable
{
    /** @param float|null $low Lower bound, clamped at zero; null with no fit. */
    public function __construct(
        public readonly string $day,
        public readonly float $expected,
        public readonly ?float $low,
        public readonly ?float $high,
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
            day: Coerce::toString($data['day'] ?? null),
            expected: Coerce::toFloat($data['expected'] ?? null),
            low: Coerce::toFloatOrNull($data['low'] ?? null),
            high: Coerce::toFloatOrNull($data['high'] ?? null),
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
            'day' => $this->day,
            'expected' => $this->expected,
            'low' => $this->low,
            'high' => $this->high,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
