<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
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
 * One of the indexed feeds the moment union draws from.
 *
 * The values `MomentFeedId` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class MomentFeedId
{
    public const CHANGES = 'changes';
    public const STATUS_INCIDENTS = 'statusIncidents';
    public const COST_ANOMALIES = 'costAnomalies';
    public const WORKFLOW_RUNS = 'workflowRuns';
    public const DEPLOYMENTS = 'deployments';
    public const AUDIT = 'audit';
    public const FREEZES = 'freezes';
    public const DRIFT_ALERTS = 'driftAlerts';
    public const EXPIRY_ALERTS = 'expiryAlerts';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::CHANGES,
            self::STATUS_INCIDENTS,
            self::COST_ANOMALIES,
            self::WORKFLOW_RUNS,
            self::DEPLOYMENTS,
            self::AUDIT,
            self::FREEZES,
            self::DRIFT_ALERTS,
            self::EXPIRY_ALERTS,
        ];
    }
}
