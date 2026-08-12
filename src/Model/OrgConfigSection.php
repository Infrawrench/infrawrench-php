<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
 * The values `OrgConfigSection` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class OrgConfigSection
{
    public const BUDGETS = 'budgets';
    public const CUSTOM_GRAPHS = 'customGraphs';
    public const WORKFLOWS = 'workflows';
    public const DASHBOARDS = 'dashboards';
    public const METRIC_ALERTS = 'metricAlerts';
    public const PROBES = 'probes';
    public const COST_CENTRES = 'costCentres';
    public const TAG_POLICY = 'tagPolicy';
    public const ALERT_SETTINGS = 'alertSettings';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::BUDGETS,
            self::CUSTOM_GRAPHS,
            self::WORKFLOWS,
            self::DASHBOARDS,
            self::METRIC_ALERTS,
            self::PROBES,
            self::COST_CENTRES,
            self::TAG_POLICY,
            self::ALERT_SETTINGS,
        ];
    }
}
