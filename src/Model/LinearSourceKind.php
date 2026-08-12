<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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
 * Which detector produced the finding the issue was filed from.
 *
 * The values `LinearSourceKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class LinearSourceKind
{
    public const COST_ANOMALY = 'cost_anomaly';
    public const ORPHAN = 'orphan';
    public const OVERSIZED = 'oversized';
    public const POSTURE_FINDING = 'posture_finding';
    public const EXPIRING = 'expiring';
    public const PROBE = 'probe';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COST_ANOMALY,
            self::ORPHAN,
            self::OVERSIZED,
            self::POSTURE_FINDING,
            self::EXPIRING,
            self::PROBE,
        ];
    }
}
