<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
 * Provider OAuth connection state. `null` for pasted credentials; `reconnect_required` when the
 * provider revoked the connection or its refresh token expired, and the account needs `POST
 * /provider-oauth/{pluginId}/authorize` with its `accountId` again.
 *
 * The values `AccountOAuthStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 *
 * Spec schema: `AccountOAuthStatus`.
 */
final class AccountOauthStatus
{
    public const CONNECTED = 'connected';
    public const RECONNECT_REQUIRED = 'reconnect_required';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::CONNECTED,
            self::RECONNECT_REQUIRED,
        ];
    }
}
