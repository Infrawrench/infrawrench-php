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
 * The values `NetworkFlowReportNotice` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class NetworkFlowReportNotice
{
    public const COLLECTION_DISABLED = 'collection_disabled';
    public const NO_FLOW_ACCOUNTS = 'no_flow_accounts';
    public const BEYOND_RETENTION = 'beyond_retention';
    public const SAMPLED_SOURCES = 'sampled_sources';
    public const RECUT_EXCLUDED = 'recut_excluded';
    public const UNATTRIBUTED_TRAFFIC = 'unattributed_traffic';
    public const TRUNCATED_TRAFFIC = 'truncated_traffic';
    public const MULTIPLE_CURRENCIES = 'multiple_currencies';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COLLECTION_DISABLED,
            self::NO_FLOW_ACCOUNTS,
            self::BEYOND_RETENTION,
            self::SAMPLED_SOURCES,
            self::RECUT_EXCLUDED,
            self::UNATTRIBUTED_TRAFFIC,
            self::TRUNCATED_TRAFFIC,
            self::MULTIPLE_CURRENCIES,
        ];
    }
}
