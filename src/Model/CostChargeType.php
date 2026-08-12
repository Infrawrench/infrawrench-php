<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
 * The values `CostChargeType` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostChargeType
{
    public const USAGE = 'usage';
    public const COMMITMENT_COVERED_USAGE = 'commitment_covered_usage';
    public const COMMITMENT_FEE = 'commitment_fee';
    public const COMMITMENT_DISCOUNT = 'commitment_discount';
    public const CREDIT = 'credit';
    public const TAX = 'tax';
    public const REFUND = 'refund';
    public const ADJUSTMENT = 'adjustment';
    public const SUPPORT = 'support';
    public const OTHER = 'other';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::USAGE,
            self::COMMITMENT_COVERED_USAGE,
            self::COMMITMENT_FEE,
            self::COMMITMENT_DISCOUNT,
            self::CREDIT,
            self::TAX,
            self::REFUND,
            self::ADJUSTMENT,
            self::SUPPORT,
            self::OTHER,
        ];
    }
}
