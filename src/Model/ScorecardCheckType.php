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
 * A check type from the scorecard registry.
 *
 * The values `ScorecardCheckType` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class ScorecardCheckType
{
    public const HAS_OWNER = 'has_owner';
    public const HAS_ON_CALL = 'has_on_call';
    public const SLO_WITHIN_BUDGET = 'slo_within_budget';
    public const HAS_RUNBOOK = 'has_runbook';
    public const BACKUPS_VERIFIED = 'backups_verified';
    public const NO_CRITICAL_POSTURE = 'no_critical_posture';
    public const NO_ORPHANS = 'no_orphans';
    public const REQUIRED_TAGS = 'required_tags';
    public const COST_WITHIN_BUDGET = 'cost_within_budget';
    public const NO_CRITICAL_VULNERABILITIES = 'no_critical_vulnerabilities';
    public const CHANGE_FAILURE_RATE = 'change_failure_rate';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::HAS_OWNER,
            self::HAS_ON_CALL,
            self::SLO_WITHIN_BUDGET,
            self::HAS_RUNBOOK,
            self::BACKUPS_VERIFIED,
            self::NO_CRITICAL_POSTURE,
            self::NO_ORPHANS,
            self::REQUIRED_TAGS,
            self::COST_WITHIN_BUDGET,
            self::NO_CRITICAL_VULNERABILITIES,
            self::CHANGE_FAILURE_RATE,
        ];
    }
}
