<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
 * What the metric's numbers are. `count` is a unit-less quantity (customers, requests, GB) and
 * supports unit cost only. `currency` is money the business took in, denominated in the metric's
 * own `currency`, and is the only kind margin can be computed against — `(revenue − cost) ÷
 * revenue` subtracts money from money and is undefined otherwise.
 *
 * The values `BusinessMetricKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class BusinessMetricKind
{
    public const COUNT = 'count';
    public const CURRENCY = 'currency';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COUNT,
            self::CURRENCY,
        ];
    }
}
