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

final class CostForecastSeries implements \JsonSerializable
{
    /**
     * @param string|null $forecastId Null for the automatic (trend) forecast.
     * @param list<CostForecastPoint> $points
     * @param float $deltaFromBaseline `total.expected` minus the automatic forecast's, over the same window.
     * @param list<array<string, mixed>> $scenarios
     * @param array{metricId: string, metricName: string, metricUnit: string, unitCost: float|null, metricTotal: float, coveredDays: int, totalDays: int}|null $driver
     * @param list<string> $warnings
     */
    public function __construct(
        public readonly ?string $forecastId,
        public readonly string $name,
        public readonly bool $isDefault,
        public readonly array $points,
        public readonly CostForecastTotal $total,
        public readonly float $deltaFromBaseline,
        public readonly array $scenarios,
        public readonly ?array $driver,
        public readonly array $warnings,
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
            forecastId: Coerce::toStringOrNull($data['forecastId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            isDefault: Coerce::toBool($data['isDefault'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): CostForecastPoint => CostForecastPoint::fromArray(Coerce::toArray($item))),
            total: CostForecastTotal::fromArray(Coerce::toArray($data['total'] ?? null)),
            deltaFromBaseline: Coerce::toFloat($data['deltaFromBaseline'] ?? null),
            scenarios: Coerce::mapList($data['scenarios'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            driver: Coerce::toArrayOrNull($data['driver'] ?? null),
            warnings: Coerce::mapList($data['warnings'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'forecastId' => $this->forecastId,
            'name' => $this->name,
            'isDefault' => $this->isDefault,
            'points' => array_map(static fn (CostForecastPoint $item): array => $item->toArray(), $this->points),
            'total' => $this->total->toArray(),
            'deltaFromBaseline' => $this->deltaFromBaseline,
            'scenarios' => $this->scenarios,
            'driver' => $this->driver,
            'warnings' => $this->warnings,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
