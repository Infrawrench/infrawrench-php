<?php

/*
 * infrawrench/sdk v1.62.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.62.0).
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
 * How several points the source returns for one day (and label) become that day's value. A SQL
 * query grouped by day returns one row per day and every choice agrees.
 *
 * The values `BusinessMetricImportAggregation` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class BusinessMetricImportAggregation
{
    public const SUM = 'sum';
    public const AVERAGE = 'average';
    public const MIN = 'min';
    public const MAX = 'max';
    public const LAST = 'last';
    public const COUNT = 'count';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::SUM,
            self::AVERAGE,
            self::MIN,
            self::MAX,
            self::LAST,
            self::COUNT,
        ];
    }
}
