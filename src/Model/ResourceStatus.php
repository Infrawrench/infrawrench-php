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
 * Normalized status reported by a plugin's renderSidebarItem/renderDetail.
 *
 * The values `ResourceStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ResourceStatus
{
    public const HEALTHY = 'healthy';
    public const DEGRADED = 'degraded';
    public const ERROR = 'error';
    public const UNKNOWN = 'unknown';
    public const PROVISIONING = 'provisioning';
    public const INFO = 'info';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::HEALTHY,
            self::DEGRADED,
            self::ERROR,
            self::UNKNOWN,
            self::PROVISIONING,
            self::INFO,
        ];
    }
}
