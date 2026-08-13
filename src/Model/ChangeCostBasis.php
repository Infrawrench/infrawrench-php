<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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
 * Which charge-type basis both windows are read on. `cash` (the default) is what the provider
 * charged on the day it charged it; `amortized` spreads a commitment's up-front fee across the
 * term it buys. It is echoed on every response because a delta whose basis is unstated is
 * unreadable — an amortized 'after' against a cash 'before' looks exactly like a saving.
 *
 * The values `ChangeCostBasis` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ChangeCostBasis
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
