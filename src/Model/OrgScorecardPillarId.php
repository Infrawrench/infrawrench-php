<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * Which existing feed the org grade pillar reads. Each is a reading of a feed that already exists,
 * so a pillar can never disagree with the page it links to.
 *
 * The values `OrgScorecardPillarId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class OrgScorecardPillarId
{
    public const POSTURE = 'posture';
    public const RECOVERABILITY = 'recoverability';
    public const SERVICES = 'services';
    public const DEADLINES = 'deadlines';
    public const ACCESS = 'access';
    public const HEADROOM = 'headroom';
    public const OWNERSHIP = 'ownership';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::POSTURE,
            self::RECOVERABILITY,
            self::SERVICES,
            self::DEADLINES,
            self::ACCESS,
            self::HEADROOM,
            self::OWNERSHIP,
        ];
    }
}
