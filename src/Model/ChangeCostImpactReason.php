<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
 * Why the result reads the way it does. Every non-`measured` status carries at least one, and
 * `measured` carries whatever lowered its confidence. `period_native_provider` is the notable one:
 * a provider that dates a whole invoice period to the period's start cannot be read by a
 * day-window comparison at all.
 *
 * The values `ChangeCostImpactReason` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ChangeCostImpactReason
{
    public const NO_COST_IDENTITY = 'no_cost_identity';
    public const PERIOD_NATIVE_PROVIDER = 'period_native_provider';
    public const NO_COST_DATA = 'no_cost_data';
    public const NO_COVERAGE_BEFORE = 'no_coverage_before';
    public const NO_COVERAGE_AFTER = 'no_coverage_after';
    public const SHORT_WINDOW = 'short_window';
    public const WINDOW_CLAMPED = 'window_clamped';
    public const OVERLAPPING_CHANGES = 'overlapping_changes';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::NO_COST_IDENTITY,
            self::PERIOD_NATIVE_PROVIDER,
            self::NO_COST_DATA,
            self::NO_COVERAGE_BEFORE,
            self::NO_COVERAGE_AFTER,
            self::SHORT_WINDOW,
            self::WINDOW_CLAMPED,
            self::OVERLAPPING_CHANGES,
        ];
    }
}
