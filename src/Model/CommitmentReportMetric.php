<?php

/*
 * infrawrench/sdk v1.118.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.118.0).
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

/**
 * The metric the chart draws. A result always carries every metric.
 *
 * The values `CommitmentReportMetric` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CommitmentReportMetric
{
    public const COVERAGE = 'coverage';
    public const ELIGIBLE_COVERAGE = 'eligibleCoverage';
    public const UTILIZATION = 'utilization';
    public const EFFECTIVE_SAVINGS_RATE = 'effectiveSavingsRate';
    public const NET_SAVINGS = 'netSavings';
    public const ON_DEMAND_REMAINDER = 'onDemandRemainder';
    public const COMMITMENT_COST = 'commitmentCost';
    public const USED_COMMITMENT_COST = 'usedCommitmentCost';
    public const UNUSED_COMMITMENT_COST = 'unusedCommitmentCost';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COVERAGE,
            self::ELIGIBLE_COVERAGE,
            self::UTILIZATION,
            self::EFFECTIVE_SAVINGS_RATE,
            self::NET_SAVINGS,
            self::ON_DEMAND_REMAINDER,
            self::COMMITMENT_COST,
            self::USED_COMMITMENT_COST,
            self::UNUSED_COMMITMENT_COST,
        ];
    }
}
