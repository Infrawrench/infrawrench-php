<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
 * Coarse geography. A provider without the requested region is priced in its first declared region
 * in this area.
 *
 * The values `PriceCatalogArea` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class PriceCatalogArea
{
    public const NORTH_AMERICA = 'north-america';
    public const SOUTH_AMERICA = 'south-america';
    public const EUROPE = 'europe';
    public const ASIA_PACIFIC = 'asia-pacific';
    public const MIDDLE_EAST = 'middle-east';
    public const AFRICA = 'africa';
    public const OCEANIA = 'oceania';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::NORTH_AMERICA,
            self::SOUTH_AMERICA,
            self::EUROPE,
            self::ASIA_PACIFIC,
            self::MIDDLE_EAST,
            self::AFRICA,
            self::OCEANIA,
        ];
    }
}
