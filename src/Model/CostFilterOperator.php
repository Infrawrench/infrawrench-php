<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
 * `in` / `not_in` compare exactly. `flexible_match` compares after ignoring letter case,
 * whitespace, `_` and `-` (so `Prod_Env` matches `prod-env`). `contains`, `not_contains` and
 * `starts_with` are substring and prefix tests, ignoring letter case. Each matches when any listed
 * value does (`not_in` and `not_contains`: when none does). `is_set` / `is_not_set` test whether a
 * `tag` or `virtual_tag` has a value, and take an empty `values`.
 *
 * The values `CostFilterOperator` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostFilterOperator
{
    public const IN = 'in';
    public const NOT_IN = 'not_in';
    public const FLEXIBLE_MATCH = 'flexible_match';
    public const CONTAINS = 'contains';
    public const NOT_CONTAINS = 'not_contains';
    public const STARTS_WITH = 'starts_with';
    public const IS_SET = 'is_set';
    public const IS_NOT_SET = 'is_not_set';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::IN,
            self::NOT_IN,
            self::FLEXIBLE_MATCH,
            self::CONTAINS,
            self::NOT_CONTAINS,
            self::STARTS_WITH,
            self::IS_SET,
            self::IS_NOT_SET,
        ];
    }
}
