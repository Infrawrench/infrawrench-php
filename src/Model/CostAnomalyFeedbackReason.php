<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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
 * The values `CostAnomalyFeedbackReason` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostAnomalyFeedbackReason
{
    public const PLANNED_LAUNCH = 'planned_launch';
    public const MIGRATION = 'migration';
    public const SEASONAL = 'seasonal';
    public const PRICING_CHANGE = 'pricing_change';
    public const DATA_ISSUE = 'data_issue';
    public const OTHER = 'other';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::PLANNED_LAUNCH,
            self::MIGRATION,
            self::SEASONAL,
            self::PRICING_CHANGE,
            self::DATA_ISSUE,
            self::OTHER,
        ];
    }
}
