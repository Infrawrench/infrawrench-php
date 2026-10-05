<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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
 * `unit_cost` is spend ÷ metric value. `margin` is `(revenue − spend) ÷ revenue` as a fraction,
 * with the absolute margin beside it, and needs a `currency` metric. `usage_unit_cost` is spend ÷
 * the usage quantity providers report in one `usageUnit`, and needs no metric (use `POST
 * /business-metrics/usage-unit-costs`). `raw_metric` plots the metric itself beside spend, where
 * zero and negative values are real points.
 *
 * The values `UnitCostMode` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class UnitCostMode
{
    public const UNIT_COST = 'unit_cost';
    public const MARGIN = 'margin';
    public const USAGE_UNIT_COST = 'usage_unit_cost';
    public const RAW_METRIC = 'raw_metric';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::UNIT_COST,
            self::MARGIN,
            self::USAGE_UNIT_COST,
            self::RAW_METRIC,
        ];
    }
}
