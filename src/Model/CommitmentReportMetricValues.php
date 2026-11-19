<?php

/*
 * infrawrench/sdk v1.121.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.121.0).
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

final class CommitmentReportMetricValues implements \JsonSerializable
{
    /**
     * @param float|null $coverage covered ÷ (coveredAll + uncovered), or the bucket's usage under a commitment grouping. Null when the denominator is zero, never 0.
     * @param float|null $eligibleCoverage covered ÷ (coveredAll + uncoveredEligible): the upper bound of coverage. Null when the denominator is zero, never 0.
     * @param float|null $utilization covered ÷ (covered + unused). Null when the denominator is zero, never 0.
     * @param float|null $effectiveSavingsRate netSavings ÷ (onDemandEquivalent + uncovered). Null also when netSavings is null. Null when the denominator is zero, never 0.
     * @param float|null $netSavings (coveredOnDemand − coveredMeasured) − unused. Null when there was covered usage and none of it had a reported on-demand equivalent; covered usage without one counts as saving nothing.
     * @param float $onDemandRemainder uncovered.
     * @param float $commitmentCost covered + unused.
     * @param float $usedCommitmentCost covered.
     * @param float $unusedCommitmentCost unused.
     * @param float $onDemandEquivalent coveredOnDemand + (covered − coveredMeasured).
     * @param float|null $savingsMeasuredShare coveredMeasured ÷ covered: how much of the covered spend the savings figure measured. Null without covered spend.
     */
    public function __construct(
        public readonly ?float $coverage,
        public readonly ?float $eligibleCoverage,
        public readonly ?float $utilization,
        public readonly ?float $effectiveSavingsRate,
        public readonly ?float $netSavings,
        public readonly float $onDemandRemainder,
        public readonly float $commitmentCost,
        public readonly float $usedCommitmentCost,
        public readonly float $unusedCommitmentCost,
        public readonly float $onDemandEquivalent,
        public readonly ?float $savingsMeasuredShare,
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
            coverage: Coerce::toFloatOrNull($data['coverage'] ?? null),
            eligibleCoverage: Coerce::toFloatOrNull($data['eligibleCoverage'] ?? null),
            utilization: Coerce::toFloatOrNull($data['utilization'] ?? null),
            effectiveSavingsRate: Coerce::toFloatOrNull($data['effectiveSavingsRate'] ?? null),
            netSavings: Coerce::toFloatOrNull($data['netSavings'] ?? null),
            onDemandRemainder: Coerce::toFloat($data['onDemandRemainder'] ?? null),
            commitmentCost: Coerce::toFloat($data['commitmentCost'] ?? null),
            usedCommitmentCost: Coerce::toFloat($data['usedCommitmentCost'] ?? null),
            unusedCommitmentCost: Coerce::toFloat($data['unusedCommitmentCost'] ?? null),
            onDemandEquivalent: Coerce::toFloat($data['onDemandEquivalent'] ?? null),
            savingsMeasuredShare: Coerce::toFloatOrNull($data['savingsMeasuredShare'] ?? null),
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
            'coverage' => $this->coverage,
            'eligibleCoverage' => $this->eligibleCoverage,
            'utilization' => $this->utilization,
            'effectiveSavingsRate' => $this->effectiveSavingsRate,
            'netSavings' => $this->netSavings,
            'onDemandRemainder' => $this->onDemandRemainder,
            'commitmentCost' => $this->commitmentCost,
            'usedCommitmentCost' => $this->usedCommitmentCost,
            'unusedCommitmentCost' => $this->unusedCommitmentCost,
            'onDemandEquivalent' => $this->onDemandEquivalent,
            'savingsMeasuredShare' => $this->savingsMeasuredShare,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
