<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class RunwayForecast implements \JsonSerializable
{
    /**
     * @param float|null $perDay Change in usage per day, in the row's unit. A Theil-Sen slope (the median of every pairwise slope) over the recorded readings, or for a monthly allowance with too few readings this cycle, the average since the cycle started. Null without a rate.
     * @param float|null $daysLeft Days until usage reaches the limit at that rate. Null when flat or falling, when already full, when the crossing is more than 365 days out, or (for an allowance) when the cycle resets first.
     * @param string|null $fullAt The crossing, when `daysLeft` is set.
     * @param 'trend'|'cycle-average'|null $method
     * @param 'ok'|'noisy'|'short' $confidence `short`: fewer than 3 readings or less than a day of history, so no projection. `noisy`: the scatter around the trend is as large as the change it explains. `ok` otherwise.
     * @param int $points Readings the fit used.
     */
    public function __construct(
        public readonly ?float $perDay,
        public readonly ?float $daysLeft,
        public readonly ?string $fullAt,
        public readonly ?string $method,
        public readonly string $confidence,
        public readonly int $points,
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
            perDay: Coerce::toFloatOrNull($data['perDay'] ?? null),
            daysLeft: Coerce::toFloatOrNull($data['daysLeft'] ?? null),
            fullAt: Coerce::toStringOrNull($data['fullAt'] ?? null),
            method: Coerce::toStringOrNull($data['method'] ?? null),
            confidence: Coerce::toString($data['confidence'] ?? null),
            points: Coerce::toInt($data['points'] ?? null),
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
            'perDay' => $this->perDay,
            'daysLeft' => $this->daysLeft,
            'fullAt' => $this->fullAt,
            'method' => $this->method,
            'confidence' => $this->confidence,
            'points' => $this->points,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
