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

final class CostReportRunOverrides implements \JsonSerializable
{
    /**
     * @param CostMeasure::*|null $measure
     * @param string|null $usageUnit The usage unit a `usage` measure sums, exactly as the provider spells it (`Hrs`, `GB-Mo`). List them with GET /costs/dimensions?dimension=usage-units. Required for `usage`, refused for any other measure.
     * @param CostBinning::*|null $binning
     * @param bool|null $cumulative Running totals from the start of the range, at any bin size. Omitted is off. Totals then report the last point rather than the sum.
     * @param string|null $xAxis Put a dimension on the X axis for this run, or `date` to put the date bins back on a report saved with a dimension axis. A dimension axis drops the saved forecast and scenario for the run; a count or running total falls back to the date axis.
     * @param string|null $xAxisTagKey Required when `xAxis` is `tag` or `virtual_tag`: which key's values go on the axis.
     */
    public function __construct(
        public readonly ?string $measure = null,
        public readonly ?string $usageUnit = null,
        public readonly ?string $binning = null,
        public readonly ?bool $cumulative = null,
        public readonly ?string $xAxis = null,
        public readonly ?string $xAxisTagKey = null,
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
            measure: Coerce::toStringOrNull($data['measure'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
            binning: Coerce::toStringOrNull($data['binning'] ?? null),
            cumulative: Coerce::toBoolOrNull($data['cumulative'] ?? null),
            xAxis: Coerce::toStringOrNull($data['xAxis'] ?? null),
            xAxisTagKey: Coerce::toStringOrNull($data['xAxisTagKey'] ?? null),
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
        ];
        if ($this->measure !== null) {
            $payload['measure'] = $this->measure;
        }
        if ($this->usageUnit !== null) {
            $payload['usageUnit'] = $this->usageUnit;
        }
        if ($this->binning !== null) {
            $payload['binning'] = $this->binning;
        }
        if ($this->cumulative !== null) {
            $payload['cumulative'] = $this->cumulative;
        }
        if ($this->xAxis !== null) {
            $payload['xAxis'] = $this->xAxis;
        }
        if ($this->xAxisTagKey !== null) {
            $payload['xAxisTagKey'] = $this->xAxisTagKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
