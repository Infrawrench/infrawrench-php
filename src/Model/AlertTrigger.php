<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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
 * A kind of alert that can be routed.
 *
 * The values `AlertTrigger` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class AlertTrigger
{
    public const SYNC_INCIDENTS = 'syncIncidents';
    public const BUDGET_ALERTS = 'budgetAlerts';
    public const ANOMALY_ALERTS = 'anomalyAlerts';
    public const COST_CHANGE_ALERTS = 'costChangeAlerts';
    public const COMMITMENT_EXPIRY_ALERTS = 'commitmentExpiryAlerts';
    public const COMMITMENT_IDLE_ALERTS = 'commitmentIdleAlerts';
    public const UNIT_COST_REGRESSION_ALERTS = 'unitCostRegressionAlerts';
    public const METRIC_ALERTS = 'metricAlerts';
    public const RESOURCE_DRIFT = 'resourceDrift';
    public const WORKFLOW_PAGES = 'workflowPages';
    public const PROVIDER_INCIDENTS = 'providerIncidents';
    public const EXPIRY_ALERTS = 'expiryAlerts';
    public const LOG_MATCH_ALERTS = 'logMatchAlerts';
    public const POSTURE_ALERTS = 'postureAlerts';
    public const PROBE_ALERTS = 'probeAlerts';
    public const QUOTA_ALERTS = 'quotaAlerts';
    public const INCIDENT_ALERTS = 'incidentAlerts';
    public const WEEKLY_DIGEST = 'weeklyDigest';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::SYNC_INCIDENTS,
            self::BUDGET_ALERTS,
            self::ANOMALY_ALERTS,
            self::COST_CHANGE_ALERTS,
            self::COMMITMENT_EXPIRY_ALERTS,
            self::COMMITMENT_IDLE_ALERTS,
            self::UNIT_COST_REGRESSION_ALERTS,
            self::METRIC_ALERTS,
            self::RESOURCE_DRIFT,
            self::WORKFLOW_PAGES,
            self::PROVIDER_INCIDENTS,
            self::EXPIRY_ALERTS,
            self::LOG_MATCH_ALERTS,
            self::POSTURE_ALERTS,
            self::PROBE_ALERTS,
            self::QUOTA_ALERTS,
            self::INCIDENT_ALERTS,
            self::WEEKLY_DIGEST,
        ];
    }
}
