<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
 * gzip unpacks the uploaded app server; xkb is the keyboard layout data xkbcommon compiles a
 * keymap from; dbus is the session bus GTK applications wait for; fonts, mesa and icons decide
 * what an application then looks like.
 *
 * The values `LinuxAppRequirementId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class LinuxAppRequirementId
{
    public const GZIP = 'gzip';
    public const XKB = 'xkb';
    public const DBUS = 'dbus';
    public const FONTS = 'fonts';
    public const MESA = 'mesa';
    public const ICONS = 'icons';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::GZIP,
            self::XKB,
            self::DBUS,
            self::FONTS,
            self::MESA,
            self::ICONS,
        ];
    }
}
