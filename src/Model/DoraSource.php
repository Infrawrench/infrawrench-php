<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
 * Where the change was learned from: an Infrafile run, a synced provider deploy, a GitHub
 * deployment, one recorded over this API, or the change timeline.
 *
 * The values `DoraSource` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class DoraSource
{
    public const INFRAFILE = 'infrafile';
    public const PLUGIN = 'plugin';
    public const GITHUB = 'github';
    public const API = 'api';
    public const CHANGE_TIMELINE = 'change_timeline';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::INFRAFILE,
            self::PLUGIN,
            self::GITHUB,
            self::API,
            self::CHANGE_TIMELINE,
        ];
    }
}
