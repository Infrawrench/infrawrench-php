<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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
 * `rightsizing`: a resize to a smaller size; `orphan_deletion`: a resource the orphan finder flags
 * was deleted; `sleep_schedule`: a stretch of a sleep/wake schedule in force; `commitment`:
 * reservation and savings-plan discounts, derived from billing; `manual`: logged by a person.
 *
 * The values `SavingsEventKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SavingsEventKind
{
    public const RIGHTSIZING = 'rightsizing';
    public const ORPHAN_DELETION = 'orphan_deletion';
    public const SLEEP_SCHEDULE = 'sleep_schedule';
    public const COMMITMENT = 'commitment';
    public const MANUAL = 'manual';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::RIGHTSIZING,
            self::ORPHAN_DELETION,
            self::SLEEP_SCHEDULE,
            self::COMMITMENT,
            self::MANUAL,
        ];
    }
}
