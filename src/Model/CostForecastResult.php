<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class CostForecastResult implements \JsonSerializable
{
    /**
     * @param string|null $currency Currency of every amount: the org's display currency when it has one.
     * @param list<CostForecastSeries>|null $forecasts
     */
    public function __construct(
        public readonly string $reportId,
        public readonly string $reportName,
        public readonly string $from,
        public readonly string $to,
        public readonly ?string $lastObservedDay,
        public readonly ?string $currency,
        public readonly float $confidenceLevel,
        public readonly CostForecastSeries $baseline,
        public readonly CostForecastSeries $forecast,
        public readonly ?array $forecasts = null,
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
            reportId: Coerce::toString($data['reportId'] ?? null),
            reportName: Coerce::toString($data['reportName'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            lastObservedDay: Coerce::toStringOrNull($data['lastObservedDay'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            confidenceLevel: Coerce::toFloat($data['confidenceLevel'] ?? null),
            baseline: CostForecastSeries::fromArray(Coerce::toArray($data['baseline'] ?? null)),
            forecast: CostForecastSeries::fromArray(Coerce::toArray($data['forecast'] ?? null)),
            forecasts: Coerce::nullable($data['forecasts'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostForecastSeries => CostForecastSeries::fromArray(Coerce::toArray($item)))),
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
            'reportId' => $this->reportId,
            'reportName' => $this->reportName,
            'from' => $this->from,
            'to' => $this->to,
            'lastObservedDay' => $this->lastObservedDay,
            'currency' => $this->currency,
            'confidenceLevel' => $this->confidenceLevel,
            'baseline' => $this->baseline->toArray(),
            'forecast' => $this->forecast->toArray(),
        ];
        if ($this->forecasts !== null) {
            $payload['forecasts'] = array_map(static fn (CostForecastSeries $item): array => $item->toArray(), $this->forecasts);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
