<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
 * The values `CostDimension` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CostDimension
{
    public const PROVIDER = 'provider';
    public const ACCOUNT = 'account';
    public const SERVICE = 'service';
    public const REGION = 'region';
    public const RESOURCE = 'resource';
    public const TAG = 'tag';
    public const CHARGE_TYPE = 'charge_type';
    public const COMMITMENT = 'commitment';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::PROVIDER,
            self::ACCOUNT,
            self::SERVICE,
            self::REGION,
            self::RESOURCE,
            self::TAG,
            self::CHARGE_TYPE,
            self::COMMITMENT,
        ];
    }
}
