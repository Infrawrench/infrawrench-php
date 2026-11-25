<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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
 * `revoke` runs the plugin's declared revoke action (`principalRole.revokeActionId`); `remove`
 * deletes a principal whose plugin declares `offboardByDelete` (a membership, a personal token);
 * `remove-seat` removes a paid seat through the provider; `transfer-ownership` and
 * `reassign-on-call` need a `targetUserId`.
 *
 * The values `OffboardingActionId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class OffboardingActionId
{
    public const REVOKE = 'revoke';
    public const REMOVE = 'remove';
    public const REMOVE_SEAT = 'remove-seat';
    public const REMOVE_MEMBER = 'remove-member';
    public const REVOKE_API_KEY = 'revoke-api-key';
    public const DELETE_SSH_KEY = 'delete-ssh-key';
    public const TRANSFER_OWNERSHIP = 'transfer-ownership';
    public const REASSIGN_ON_CALL = 'reassign-on-call';
    public const REMOVE_FROM_ROTATION = 'remove-from-rotation';
    public const CANCEL_COVER = 'cancel-cover';
    public const CANCEL_LEASE = 'cancel-lease';
    public const REVOKE_JIT = 'revoke-jit';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::REVOKE,
            self::REMOVE,
            self::REMOVE_SEAT,
            self::REMOVE_MEMBER,
            self::REVOKE_API_KEY,
            self::DELETE_SSH_KEY,
            self::TRANSFER_OWNERSHIP,
            self::REASSIGN_ON_CALL,
            self::REMOVE_FROM_ROTATION,
            self::CANCEL_COVER,
            self::CANCEL_LEASE,
            self::REVOKE_JIT,
        ];
    }
}
