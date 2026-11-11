<?php

/*
 * infrawrench/sdk v1.102.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.102.0).
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
 * An app the application is presented as.
 *
 * The values `OrgProductId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class OrgProductId
{
    public const INFRASTRUCTURE = 'infrastructure';
    public const COSTS = 'costs';
    public const OBSERVABILITY = 'observability';
    public const INCIDENTS = 'incidents';
    public const SECURITY = 'security';
    public const DELIVERY = 'delivery';
    public const AUTOMATION = 'automation';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::INFRASTRUCTURE,
            self::COSTS,
            self::OBSERVABILITY,
            self::INCIDENTS,
            self::SECURITY,
            self::DELIVERY,
            self::AUTOMATION,
        ];
    }
}
