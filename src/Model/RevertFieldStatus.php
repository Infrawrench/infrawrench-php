<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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
 * What a revert would do to one field. `revertible` — the field still holds the value the change
 * set, and the plugin's edit form can write the old one back. `already-reverted` — it is already
 * at the old value; nothing to do. `conflict` — it changed again since, so reverting would discard
 * the newer value. `not-writable` — outside the plugin's editable surface, or the old value is not
 * something the edit form can submit. `provider-derived` — an `outputs.*` entry, which the
 * provider computes rather than accepts.
 *
 * The values `RevertFieldStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class RevertFieldStatus
{
    public const REVERTIBLE = 'revertible';
    public const ALREADY_REVERTED = 'already-reverted';
    public const CONFLICT = 'conflict';
    public const NOT_WRITABLE = 'not-writable';
    public const PROVIDER_DERIVED = 'provider-derived';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::REVERTIBLE,
            self::ALREADY_REVERTED,
            self::CONFLICT,
            self::NOT_WRITABLE,
            self::PROVIDER_DERIVED,
        ];
    }
}
