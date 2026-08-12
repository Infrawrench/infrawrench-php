<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class CommitmentRecommendation implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param float $recommendedDailyCommitment p10 of daily uncovered usage spend, nearest-rank — the floor, not the average.
     * @param 'range'|'upper_bound' $savingBasis Published discounts are "up to" figures. `range` renders "$X–$Y"; `upper_bound` renders "up to $Y" — never a bare "$Y".
     * @param float $breakEvenUtilization 1 − discount: below this utilization the commitment loses to on-demand. Equivalently, the workload can shrink by the discount before committing was a mistake.
     * @param float $annualLossIfUsageHalves max(0, annualCommitment × (0.5 − discount)) at the shallow end of the published discount — a ceiling on regret where no floor rate is published.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $service,
        public readonly string $region,
        public readonly string $currency,
        public readonly float $recommendedDailyCommitment,
        public readonly float $recommendedHourlyCommitment,
        public readonly float $annualCommitment,
        public readonly float $p50DailySpend,
        public readonly string $savingBasis,
        public readonly float $discountRateMax,
        public readonly float $estimatedAnnualSavingMax,
        public readonly float $breakEvenUtilization,
        public readonly float $annualLossIfUsageHalves,
        public readonly ?float $discountRateMin = null,
        public readonly ?float $estimatedAnnualSavingMin = null,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            service: Coerce::toString($data['service'] ?? null),
            region: Coerce::toString($data['region'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            recommendedDailyCommitment: Coerce::toFloat($data['recommendedDailyCommitment'] ?? null),
            recommendedHourlyCommitment: Coerce::toFloat($data['recommendedHourlyCommitment'] ?? null),
            annualCommitment: Coerce::toFloat($data['annualCommitment'] ?? null),
            p50DailySpend: Coerce::toFloat($data['p50DailySpend'] ?? null),
            savingBasis: Coerce::toString($data['savingBasis'] ?? null),
            discountRateMax: Coerce::toFloat($data['discountRateMax'] ?? null),
            estimatedAnnualSavingMax: Coerce::toFloat($data['estimatedAnnualSavingMax'] ?? null),
            breakEvenUtilization: Coerce::toFloat($data['breakEvenUtilization'] ?? null),
            annualLossIfUsageHalves: Coerce::toFloat($data['annualLossIfUsageHalves'] ?? null),
            discountRateMin: Coerce::toFloatOrNull($data['discountRateMin'] ?? null),
            estimatedAnnualSavingMin: Coerce::toFloatOrNull($data['estimatedAnnualSavingMin'] ?? null),
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
            'pluginId' => $this->pluginId,
            'service' => $this->service,
            'region' => $this->region,
            'currency' => $this->currency,
            'recommendedDailyCommitment' => $this->recommendedDailyCommitment,
            'recommendedHourlyCommitment' => $this->recommendedHourlyCommitment,
            'annualCommitment' => $this->annualCommitment,
            'p50DailySpend' => $this->p50DailySpend,
            'savingBasis' => $this->savingBasis,
            'discountRateMax' => $this->discountRateMax,
            'estimatedAnnualSavingMax' => $this->estimatedAnnualSavingMax,
            'breakEvenUtilization' => $this->breakEvenUtilization,
            'annualLossIfUsageHalves' => $this->annualLossIfUsageHalves,
        ];
        if ($this->discountRateMin !== null) {
            $payload['discountRateMin'] = $this->discountRateMin;
        }
        if ($this->estimatedAnnualSavingMin !== null) {
            $payload['estimatedAnnualSavingMin'] = $this->estimatedAnnualSavingMin;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
