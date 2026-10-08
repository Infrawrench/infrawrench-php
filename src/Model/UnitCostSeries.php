<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class UnitCostSeries implements \JsonSerializable
{
    /**
     * @param list<UnitCostPoint> $points
     * @param float|null $overallValue The period ratio: **summed numerator ÷ summed denominator**, not the mean of the per-bucket ratios: the mean weights a quiet Sunday exactly as heavily as a peak Monday. Only buckets that produced a ratio contribute, on both sides.
     * @param array{key: string, value: string|null, other?: bool}|null $label Set when the query grouped by a label.
     */
    public function __construct(
        public readonly string $currency,
        public readonly array $points,
        public readonly ?float $overallValue,
        public readonly float $overallCost,
        public readonly ?float $overallMetricValue,
        public readonly ?array $label = null,
        public readonly ?float $overallAbsoluteMargin = null,
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
            currency: Coerce::toString($data['currency'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): UnitCostPoint => UnitCostPoint::fromArray(Coerce::toArray($item))),
            overallValue: Coerce::toFloatOrNull($data['overallValue'] ?? null),
            overallCost: Coerce::toFloat($data['overallCost'] ?? null),
            overallMetricValue: Coerce::toFloatOrNull($data['overallMetricValue'] ?? null),
            label: Coerce::toArrayOrNull($data['label'] ?? null),
            overallAbsoluteMargin: Coerce::toFloatOrNull($data['overallAbsoluteMargin'] ?? null),
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
            'currency' => $this->currency,
            'points' => array_map(static fn (UnitCostPoint $item): array => $item->toArray(), $this->points),
            'overallValue' => $this->overallValue,
            'overallCost' => $this->overallCost,
            'overallMetricValue' => $this->overallMetricValue,
        ];
        if ($this->label !== null) {
            $payload['label'] = $this->label;
        }
        if ($this->overallAbsoluteMargin !== null) {
            $payload['overallAbsoluteMargin'] = $this->overallAbsoluteMargin;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
