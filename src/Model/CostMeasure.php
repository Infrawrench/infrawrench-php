<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
 * What the Y axis sums. `cost` (the default) is money per currency. `usage` sums the usage
 * quantity providers report beside the money and requires `usageUnit`, because quantities in
 * different units cannot be added. `count` is how many distinct values of the `groupBy` dimension
 * had nonzero cost in each bin (how many services were billed each day) and requires a `groupBy`;
 * its range total is a distinct count, not a sum of the bins. `usage` and `count` cannot carry a
 * forecast, a scenario or billing rules (a 400), `count` cannot be cumulative, and a display
 * currency is ignored for both.
 *
 * The values `CostMeasure` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostMeasure
{
    public const COST = 'cost';
    public const USAGE = 'usage';
    public const COUNT = 'count';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COST,
            self::USAGE,
            self::COUNT,
        ];
    }
}
