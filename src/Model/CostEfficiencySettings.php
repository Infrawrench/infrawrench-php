<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class CostEfficiencySettings implements \JsonSerializable
{
    /**
     * @param bool $commitmentExpiryEnabled Whether commitments approaching their term end raise alerts. Defaults to true.
     * @param list<int> $commitmentExpiryHorizonDays Days of notice, each firing at most once per commitment per term end. Defaults to [60, 30, 7]. A commitment fires at the *smallest* horizon it has reached, so an account connected 30 days before a term ends gets one alert, not two.
     * @param bool $commitmentExpiryAlertOnExpired Whether a commitment that lapsed without any horizon warning having fired raises one alert anyway. Defaults to true, and bounded to terms that ended within the last 90 days — connecting an account with years of dead reservations produces one pass of recent news, not an archive.
     * @param bool $commitmentIdleEnabled Whether under-used commitments raise alerts. Defaults to true.
     * @param int $commitmentIdleThresholdPercent Utilization percent the whole window must stay under. Defaults to 70 — roughly where a 1-year no-upfront commitment stops beating on-demand for the usage it covers.
     * @param int $commitmentIdleWindowDays Trailing days utilization is aggregated over. Defaults to 30. Aggregated, never sampled per day: a weekday-only workload reads about 71% over a month and does not fire, which is the point.
     * @param int $commitmentIdleMinMeasuredDays Window days that must carry cost data before anything is judged. Defaults to 14. A commitment whose utilization cannot be measured at all — a unit-denominated GCP CUD, or an account whose plugin reports no commitment attribution — never alerts, regardless of this value.
     * @param int $commitmentIdleMinWasteCents Least wasted money (obligation − delivered) before alerting, in USD cents, restated per currency. Defaults to 5000 ($50).
     * @param bool $unitCostRegressionEnabled Whether rising cost per business-metric unit raises alerts. Defaults to true.
     * @param int $unitCostThresholdPercent Percent the unit cost must rise versus the prior window. Defaults to 20.
     * @param int $unitCostWindowDays Length of each of the two compared windows. Defaults to 14 — two whole weekly cycles a side, so a weekday-shaped unit cost compares like with like.
     * @param int $unitCostMinReportedDays Days inside **each** window that must carry a reported, positive metric value. Defaults to 10. A day with no reported value is a gap and contributes to neither the numerator nor the denominator; a window that fails this bar produces no comparison at all rather than a comparison against a gap.
     * @param int $unitCostMinSpendCents Least spend in the current window before alerting, in USD cents, restated per currency. Defaults to 10000 ($100).
     */
    public function __construct(
        public readonly bool $commitmentExpiryEnabled,
        public readonly array $commitmentExpiryHorizonDays,
        public readonly bool $commitmentExpiryAlertOnExpired,
        public readonly bool $commitmentIdleEnabled,
        public readonly int $commitmentIdleThresholdPercent,
        public readonly int $commitmentIdleWindowDays,
        public readonly int $commitmentIdleMinMeasuredDays,
        public readonly int $commitmentIdleMinWasteCents,
        public readonly bool $unitCostRegressionEnabled,
        public readonly int $unitCostThresholdPercent,
        public readonly int $unitCostWindowDays,
        public readonly int $unitCostMinReportedDays,
        public readonly int $unitCostMinSpendCents,
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
            commitmentExpiryEnabled: Coerce::toBool($data['commitmentExpiryEnabled'] ?? null),
            commitmentExpiryHorizonDays: Coerce::mapList($data['commitmentExpiryHorizonDays'] ?? null, static fn (mixed $item): int => Coerce::toInt($item)),
            commitmentExpiryAlertOnExpired: Coerce::toBool($data['commitmentExpiryAlertOnExpired'] ?? null),
            commitmentIdleEnabled: Coerce::toBool($data['commitmentIdleEnabled'] ?? null),
            commitmentIdleThresholdPercent: Coerce::toInt($data['commitmentIdleThresholdPercent'] ?? null),
            commitmentIdleWindowDays: Coerce::toInt($data['commitmentIdleWindowDays'] ?? null),
            commitmentIdleMinMeasuredDays: Coerce::toInt($data['commitmentIdleMinMeasuredDays'] ?? null),
            commitmentIdleMinWasteCents: Coerce::toInt($data['commitmentIdleMinWasteCents'] ?? null),
            unitCostRegressionEnabled: Coerce::toBool($data['unitCostRegressionEnabled'] ?? null),
            unitCostThresholdPercent: Coerce::toInt($data['unitCostThresholdPercent'] ?? null),
            unitCostWindowDays: Coerce::toInt($data['unitCostWindowDays'] ?? null),
            unitCostMinReportedDays: Coerce::toInt($data['unitCostMinReportedDays'] ?? null),
            unitCostMinSpendCents: Coerce::toInt($data['unitCostMinSpendCents'] ?? null),
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
            'commitmentExpiryEnabled' => $this->commitmentExpiryEnabled,
            'commitmentExpiryHorizonDays' => $this->commitmentExpiryHorizonDays,
            'commitmentExpiryAlertOnExpired' => $this->commitmentExpiryAlertOnExpired,
            'commitmentIdleEnabled' => $this->commitmentIdleEnabled,
            'commitmentIdleThresholdPercent' => $this->commitmentIdleThresholdPercent,
            'commitmentIdleWindowDays' => $this->commitmentIdleWindowDays,
            'commitmentIdleMinMeasuredDays' => $this->commitmentIdleMinMeasuredDays,
            'commitmentIdleMinWasteCents' => $this->commitmentIdleMinWasteCents,
            'unitCostRegressionEnabled' => $this->unitCostRegressionEnabled,
            'unitCostThresholdPercent' => $this->unitCostThresholdPercent,
            'unitCostWindowDays' => $this->unitCostWindowDays,
            'unitCostMinReportedDays' => $this->unitCostMinReportedDays,
            'unitCostMinSpendCents' => $this->unitCostMinSpendCents,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
