<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
 * Time bucket of the x axis. Weeks start on Monday and quarters on the first of January, April,
 * July and October (UTC). `cumulative` is the older spelling of daily bins with `cumulative:
 * true`, kept so stored configs and existing clients keep working. `hourly` is refused with a 400
 * while no connected account stores hourly cost rows: every provider's spend is collected per UTC
 * day today (see `granularity` on /costs/status).
 *
 * The values `CostBinning` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostBinning
{
    public const HOURLY = 'hourly';
    public const DAILY = 'daily';
    public const WEEKLY = 'weekly';
    public const MONTHLY = 'monthly';
    public const QUARTERLY = 'quarterly';
    public const CUMULATIVE = 'cumulative';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::HOURLY,
            self::DAILY,
            self::WEEKLY,
            self::MONTHLY,
            self::QUARTERLY,
            self::CUMULATIVE,
        ];
    }
}
