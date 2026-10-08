<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
 * `pending` (awaiting an approver) or `timed_out`; `denied` / `cancelled`; `granting` (the
 * provider call is in flight), `active`, `grant_failed`; `revoking` then `revoked` when the window
 * ends; `revoke_failed` while a failed revoke is retried.
 *
 * The values `JitRequestStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class JitRequestStatus
{
    public const PENDING = 'pending';
    public const TIMED_OUT = 'timed_out';
    public const DENIED = 'denied';
    public const CANCELLED = 'cancelled';
    public const GRANTING = 'granting';
    public const ACTIVE = 'active';
    public const GRANT_FAILED = 'grant_failed';
    public const REVOKING = 'revoking';
    public const REVOKED = 'revoked';
    public const REVOKE_FAILED = 'revoke_failed';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::PENDING,
            self::TIMED_OUT,
            self::DENIED,
            self::CANCELLED,
            self::GRANTING,
            self::ACTIVE,
            self::GRANT_FAILED,
            self::REVOKING,
            self::REVOKED,
            self::REVOKE_FAILED,
        ];
    }
}
