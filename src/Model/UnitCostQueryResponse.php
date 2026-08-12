<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class UnitCostQueryResponse implements \JsonSerializable
{
    /**
     * @param array{id: string, key: string, name: string, unit: string, kind: BusinessMetricKind::*, currency: string|null} $metric
     * @param 'unit_cost'|'margin' $mode
     * @param 'daily'|'weekly'|'monthly'|'cumulative' $binning
     * @param list<UnitCostSeries> $series One series per currency the numerator ended up in — usually one. More than one means the organization has spend in a currency it holds no rate for; rather than dropping that spend (understating every unit cost) or adding it to another currency (inventing a number), each currency divides the same denominator on its own.
     * @param int $gapBuckets Buckets on the axis that produced no ratio at all.
     * @param int $partialBuckets Buckets whose denominator covers only part of the bucket.
     * @param array{displayCurrency: string, converted: list<array{currency: string, rates: list<array{effectiveFrom: string, rate: float}>}>, unconverted: list<string>}|null $conversion Set only when spend currencies were folded together; absent means untouched.
     */
    public function __construct(
        public readonly array $metric,
        public readonly string $mode,
        public readonly string $binning,
        public readonly array $series,
        public readonly int $gapBuckets,
        public readonly int $partialBuckets,
        public readonly ?array $conversion = null,
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
            metric: Coerce::toArray($data['metric'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            binning: Coerce::toString($data['binning'] ?? null),
            series: Coerce::mapList($data['series'] ?? null, static fn (mixed $item): UnitCostSeries => UnitCostSeries::fromArray(Coerce::toArray($item))),
            gapBuckets: Coerce::toInt($data['gapBuckets'] ?? null),
            partialBuckets: Coerce::toInt($data['partialBuckets'] ?? null),
            conversion: Coerce::toArrayOrNull($data['conversion'] ?? null),
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
            'metric' => $this->metric,
            'mode' => $this->mode,
            'binning' => $this->binning,
            'series' => array_map(static fn (UnitCostSeries $item): array => $item->toArray(), $this->series),
            'gapBuckets' => $this->gapBuckets,
            'partialBuckets' => $this->partialBuckets,
        ];
        if ($this->conversion !== null) {
            $payload['conversion'] = $this->conversion;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
