<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
 * `billing`: baseline and post-action spend both read from this resource's cost rows; `estimate`:
 * no per-resource billing, so the list-price estimate is accrued over elapsed days; `manual`: the
 * logged amount accrued; `unmeasured`: nothing to measure against (never summed as zero).
 *
 * The values `RealizedSavingsBasis` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class RealizedSavingsBasis
{
    public const BILLING = 'billing';
    public const ESTIMATE = 'estimate';
    public const MANUAL = 'manual';
    public const UNMEASURED = 'unmeasured';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::BILLING,
            self::ESTIMATE,
            self::MANUAL,
            self::UNMEASURED,
        ];
    }
}
