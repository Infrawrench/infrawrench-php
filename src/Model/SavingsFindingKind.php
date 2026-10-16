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
 * Which finder reported it: `orphan` (orphaned or idle resource), `oversized` (right-sizing),
 * `extended_support` (a version past standard support), `seat` (an unused, duplicate or
 * downgradable SaaS seat).
 *
 * The values `SavingsFindingKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SavingsFindingKind
{
    public const ORPHAN = 'orphan';
    public const OVERSIZED = 'oversized';
    public const EXTENDED_SUPPORT = 'extended_support';
    public const SEAT = 'seat';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::ORPHAN,
            self::OVERSIZED,
            self::EXTENDED_SUPPORT,
            self::SEAT,
        ];
    }
}
