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
 * `ready` (Ready for review), `in_progress`, `completed`, `archived`. Ready and In progress are
 * open: their money counts as potential savings.
 *
 * The values `SavingsFindingStatus` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SavingsFindingStatus
{
    public const READY = 'ready';
    public const IN_PROGRESS = 'in_progress';
    public const COMPLETED = 'completed';
    public const ARCHIVED = 'archived';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::READY,
            self::IN_PROGRESS,
            self::COMPLETED,
            self::ARCHIVED,
        ];
    }
}
