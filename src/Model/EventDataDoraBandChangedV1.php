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

/**
 * `data` of a `dora.band_changed` event, version 1. One of the four DORA metrics for production
 * moved to a different performance band over the trailing 30 days. Checked once a day.
 *
 * Spec schema: `EventData_dora_band_changed_v1`.
 */
final class EventDataDoraBandChangedV1 implements \JsonSerializable
{
    /**
     * @param 'deployment_frequency'|'lead_time'|'change_failure_rate'|'time_to_restore' $metric The metric.
     * @param 'elite'|'high'|'medium'|'low' $previousBand Band over the 30 days ending the day before.
     * @param 'elite'|'high'|'medium'|'low' $band Band over the 30 days ending `windowEnd`.
     * @param 'improved'|'worsened' $direction Whether performance got better or worse.
     * @param float $value The metric now: deploys per day, median hours, or a 0-1 failure fraction.
     * @param float $previousValue The metric over the window ending the day before.
     * @param int $sample Observations the current value rests on.
     * @param string $windowStart First day of the current window (YYYY-MM-DD, UTC).
     * @param string $windowEnd Last day of the current window (YYYY-MM-DD, UTC).
     */
    public function __construct(
        public readonly string $metric,
        public readonly string $previousBand,
        public readonly string $band,
        public readonly string $direction,
        public readonly float $value,
        public readonly float $previousValue,
        public readonly int $sample,
        public readonly string $windowStart,
        public readonly string $windowEnd,
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
            metric: Coerce::toString($data['metric'] ?? null),
            previousBand: Coerce::toString($data['previousBand'] ?? null),
            band: Coerce::toString($data['band'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            value: Coerce::toFloat($data['value'] ?? null),
            previousValue: Coerce::toFloat($data['previousValue'] ?? null),
            sample: Coerce::toInt($data['sample'] ?? null),
            windowStart: Coerce::toString($data['windowStart'] ?? null),
            windowEnd: Coerce::toString($data['windowEnd'] ?? null),
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
            'metric' => $this->metric,
            'previousBand' => $this->previousBand,
            'band' => $this->band,
            'direction' => $this->direction,
            'value' => $this->value,
            'previousValue' => $this->previousValue,
            'sample' => $this->sample,
            'windowStart' => $this->windowStart,
            'windowEnd' => $this->windowEnd,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
