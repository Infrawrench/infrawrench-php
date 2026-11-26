<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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
 * `unused_lumped_monthly`: a provider in scope books a month's unused commitment fee on one day of
 * its daily data, so a daily or weekly utilization dips on that day.
 * `unattributed_commitment_usage`: some covered usage could not be tied to a commitment and is
 * grouped as `__unattributed__`. `partial_savings_measurement`: some covered usage had no reported
 * on-demand equivalent and counts as saving nothing. `no_measurable_accounts`: no account in scope
 * can measure coverage.
 *
 * The values `CommitmentReportNotice` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CommitmentReportNotice
{
    public const UNUSED_LUMPED_MONTHLY = 'unused_lumped_monthly';
    public const UNATTRIBUTED_COMMITMENT_USAGE = 'unattributed_commitment_usage';
    public const PARTIAL_SAVINGS_MEASUREMENT = 'partial_savings_measurement';
    public const NO_MEASURABLE_ACCOUNTS = 'no_measurable_accounts';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::UNUSED_LUMPED_MONTHLY,
            self::UNATTRIBUTED_COMMITMENT_USAGE,
            self::PARTIAL_SAVINGS_MEASUREMENT,
            self::NO_MEASURABLE_ACCOUNTS,
        ];
    }
}
