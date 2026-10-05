<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
 * What the budget counts. `cost` (the default) is money in `currency`, against `amountCents`.
 * `usage` sums the cost rows' usage quantity in `usageUnit` against `usageAmount` (tokens, GB,
 * instance-hours, requests: whatever the providers report; list them with GET
 * /costs/dimensions?dimension=usage-units). Units are matched exactly and never converted. A usage
 * budget takes no scenario model and no billing rules.
 *
 * The values `BudgetMeasure` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class BudgetMeasure
{
    public const COST = 'cost';
    public const USAGE = 'usage';

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
        ];
    }
}
