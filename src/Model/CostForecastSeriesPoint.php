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

final class CostForecastSeriesPoint implements \JsonSerializable
{
    /**
     * @param float $amount The trend's expected amount for the day.
     * @param float|null $low Lower end of the day's prediction interval at `forecastConfidenceLevel` (the classical least-squares interval, widening with distance from the data), clamped at zero.
     * @param float|null $high Upper end of the day's prediction interval.
     */
    public function __construct(
        public readonly string $bucket,
        public readonly float $amount,
        public readonly ?float $low = null,
        public readonly ?float $high = null,
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
            bucket: Coerce::toString($data['bucket'] ?? null),
            amount: Coerce::toFloat($data['amount'] ?? null),
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
        $payload = [
            'bucket' => $this->bucket,
            'amount' => $this->amount,
        ];
        if ($this->low !== null) {
            $payload['low'] = $this->low;
        }
        if ($this->high !== null) {
            $payload['high'] = $this->high;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
