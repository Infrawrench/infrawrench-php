<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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

final class UnitCostPoint implements \JsonSerializable
{
    /**
     * @param string $bucket Bucket start date, YYYY-MM-DD.
     * @param float|null $value The ratio, or **null for a gap**. Never 0 and never infinite: a bucket with no reported metric value is unknown, not free, and rendering it as 0 would say the opposite of the truth. A zero numerator over a positive denominator is a real 0 and is returned as one.
     * @param float $cost Spend summed over the bucket, in the series' currency.
     * @param float|null $metricValue Metric value summed over the bucket, or null when nothing was reported.
     * @param int $reportedDays Days in the bucket carrying a reported value, out of `bucketDays`. When it is smaller, the denominator covers only part of the bucket and the ratio there reads high.
     * @param 'no_metric_value'|'non_positive_metric_value'|'unconvertible_currency'|null $gap Set exactly when `value` is null.
     */
    public function __construct(
        public readonly string $bucket,
        public readonly ?float $value,
        public readonly float $cost,
        public readonly ?float $metricValue,
        public readonly int $reportedDays,
        public readonly int $bucketDays,
        public readonly ?string $gap = null,
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
            value: Coerce::toFloatOrNull($data['value'] ?? null),
            cost: Coerce::toFloat($data['cost'] ?? null),
            metricValue: Coerce::toFloatOrNull($data['metricValue'] ?? null),
            reportedDays: Coerce::toInt($data['reportedDays'] ?? null),
            bucketDays: Coerce::toInt($data['bucketDays'] ?? null),
            gap: Coerce::toStringOrNull($data['gap'] ?? null),
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
            'value' => $this->value,
            'cost' => $this->cost,
            'metricValue' => $this->metricValue,
            'reportedDays' => $this->reportedDays,
            'bucketDays' => $this->bucketDays,
        ];
        if ($this->gap !== null) {
            $payload['gap'] = $this->gap;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
