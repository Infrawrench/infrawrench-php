<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
 * `measured` — both windows had collected data and the delta is real. `insufficient_data` — the
 * windows exist but are too short to compare. `unknown` — nothing here can answer the question.
 * **`unknown` is never zero**: a resource with no cost data reports that we cannot say, not that
 * the change was free.
 *
 * The values `ChangeCostImpactStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ChangeCostImpactStatus
{
    public const MEASURED = 'measured';
    public const INSUFFICIENT_DATA = 'insufficient_data';
    public const UNKNOWN = 'unknown';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::MEASURED,
            self::INSUFFICIENT_DATA,
            self::UNKNOWN,
        ];
    }
}
