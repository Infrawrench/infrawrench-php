<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
 * `in_app`: recorded when Infrawrench performed the action; `detected`: inferred from an inventory
 * diff on sync (the action was taken in the provider's console); `manual`; `derived`: computed
 * from billing with no stored event (commitments).
 *
 * The values `SavingsEventSource` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SavingsEventSource
{
    public const IN_APP = 'in_app';
    public const DETECTED = 'detected';
    public const MANUAL = 'manual';
    public const DERIVED = 'derived';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::IN_APP,
            self::DETECTED,
            self::MANUAL,
            self::DERIVED,
        ];
    }
}
