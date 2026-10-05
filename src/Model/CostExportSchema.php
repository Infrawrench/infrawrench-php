<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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
 * Which columns an object carries. `native` is Infrawrench's own layout, shaped by
 * `query.dimensions` and `query.tagKeys`. `focus-1.3` writes the FinOps Open Cost and Usage
 * Specification v1.3 columns at the full row grain, with `BilledCost` (cash) and `EffectiveCost`
 * (amortized) side by side; `query.dimensions`, `query.tagKeys` and `query.costBasis` do not apply
 * to it, `query.filters` and `query.chargeTypes` still do.
 *
 * The values `CostExportSchema` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostExportSchema
{
    public const NATIVE = 'native';
    public const FOCUS_1_3 = 'focus-1.3';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::NATIVE,
            self::FOCUS_1_3,
        ];
    }
}
