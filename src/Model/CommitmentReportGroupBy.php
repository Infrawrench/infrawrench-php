<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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
 * `commitment_type` and `commitment` split the commitment side by holding and put uncovered usage
 * in its own `__on_demand__` group; covered usage the provider did not tie to a commitment (all of
 * AWS, whose Cost Explorer cannot group by commitment) is `__unattributed__`, and a commitment the
 * inventory no longer holds is `__unknown_kind__` under `commitment_type`. Under those two, each
 * group's coverage is its share of the bucket's whole usage, so the groups add up. Instance family
 * is not offered: no collector stores it on cost rows.
 *
 * The values `CommitmentReportGroupBy` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class CommitmentReportGroupBy
{
    public const NONE = 'none';
    public const PROVIDER = 'provider';
    public const COMMITMENT_TYPE = 'commitment_type';
    public const COMMITMENT = 'commitment';
    public const SERVICE = 'service';
    public const ACCOUNT = 'account';
    public const REGION = 'region';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::NONE,
            self::PROVIDER,
            self::COMMITMENT_TYPE,
            self::COMMITMENT,
            self::SERVICE,
            self::ACCOUNT,
            self::REGION,
        ];
    }
}
