<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
 * The billing boundary a flow crossed. Intra-region VPC peering is billed, and classified, as
 * `cross_zone`; transit gateway, VPN and interconnect traffic is `private_interconnect`.
 *
 * The values `NetworkFlowTrafficClass` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class NetworkFlowTrafficClass
{
    public const INTRA_ZONE = 'intra_zone';
    public const CROSS_ZONE = 'cross_zone';
    public const CROSS_REGION = 'cross_region';
    public const INTERNET_EGRESS = 'internet_egress';
    public const INTERNET_INGRESS = 'internet_ingress';
    public const NAT_GATEWAY = 'nat_gateway';
    public const PRIVATE_INTERCONNECT = 'private_interconnect';
    public const PROVIDER_SERVICE = 'provider_service';
    public const UNKNOWN = 'unknown';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::INTRA_ZONE,
            self::CROSS_ZONE,
            self::CROSS_REGION,
            self::INTERNET_EGRESS,
            self::INTERNET_INGRESS,
            self::NAT_GATEWAY,
            self::PRIVATE_INTERCONNECT,
            self::PROVIDER_SERVICE,
            self::UNKNOWN,
        ];
    }
}
