<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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
 * Which number to sum. `cash` is what the provider charged on the day it charged it — the default,
 * and what every query returned before this existed. `amortized` spreads a commitment's up-front
 * fee across the term it buys, so a year of capacity bought on one day is counted on the days it
 * covers. Providers that report no amortized amount fall back to their cash amount, so an
 * amortized query over a mixed estate never drops their spend.
 *
 * The values `CostBasis` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostBasis
{
    public const CASH = 'cash';
    public const AMORTIZED = 'amortized';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::CASH,
            self::AMORTIZED,
        ];
    }
}
