<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * Pair-shaped groupings (`pair`, `zone_pair`, `region_pair`) key on source then destination,
 * joined by U+001F. `service` is the peer's provider service (the destination of egress, the
 * source of ingress); `network` is the local side's VPC. Under `pair`, `source` and `destination`
 * the per-day remainder below the stored pair cap is its own group, keyed `infrawrench:truncated`.
 *
 * The values `NetworkFlowReportGroupBy` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class NetworkFlowReportGroupBy
{
    public const NONE = 'none';
    public const PAIR = 'pair';
    public const SOURCE = 'source';
    public const DESTINATION = 'destination';
    public const TRAFFIC_CLASS = 'traffic_class';
    public const SERVICE = 'service';
    public const ZONE_PAIR = 'zone_pair';
    public const REGION_PAIR = 'region_pair';
    public const ACCOUNT = 'account';
    public const NETWORK = 'network';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::NONE,
            self::PAIR,
            self::SOURCE,
            self::DESTINATION,
            self::TRAFFIC_CLASS,
            self::SERVICE,
            self::ZONE_PAIR,
            self::REGION_PAIR,
            self::ACCOUNT,
            self::NETWORK,
        ];
    }
}
