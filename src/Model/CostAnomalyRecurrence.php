<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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
 * How the suppression repeats. `one_off` covers every day from `startsOn` to `expiresOn`; `weekly`
 * the anchor day's weekday; `monthly` the anchor day's day of the month, give or take a day (an
 * anchor past the end of a shorter month falls on its last day); `seasonal` the anchor day's
 * calendar date, give or take three days, every year.
 *
 * The values `CostAnomalyRecurrence` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostAnomalyRecurrence
{
    public const ONE_OFF = 'one_off';
    public const WEEKLY = 'weekly';
    public const MONTHLY = 'monthly';
    public const SEASONAL = 'seasonal';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::ONE_OFF,
            self::WEEKLY,
            self::MONTHLY,
            self::SEASONAL,
        ];
    }
}
