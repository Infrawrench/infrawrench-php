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
 * What a search hit is. `resource` and `workflow` are the original kinds; the rest are saved
 * objects (cost_report, cost_report_folder, dashboard, budget, cost_canvas, saved_cost_filter,
 * virtual_tag, business_metric, scenario_model, slo, service, runbook, status_page, probe,
 * log_query, query_monitor), returned only when asked for with `kinds`.
 *
 * The values `SearchResultKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class SearchResultKind
{
    public const RESOURCE = 'resource';
    public const WORKFLOW = 'workflow';
    public const COST_REPORT = 'cost_report';
    public const COST_REPORT_FOLDER = 'cost_report_folder';
    public const DASHBOARD = 'dashboard';
    public const BUDGET = 'budget';
    public const COST_CANVAS = 'cost_canvas';
    public const SAVED_COST_FILTER = 'saved_cost_filter';
    public const VIRTUAL_TAG = 'virtual_tag';
    public const BUSINESS_METRIC = 'business_metric';
    public const SCENARIO_MODEL = 'scenario_model';
    public const SLO = 'slo';
    public const SERVICE = 'service';
    public const RUNBOOK = 'runbook';
    public const STATUS_PAGE = 'status_page';
    public const PROBE = 'probe';
    public const LOG_QUERY = 'log_query';
    public const QUERY_MONITOR = 'query_monitor';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::RESOURCE,
            self::WORKFLOW,
            self::COST_REPORT,
            self::COST_REPORT_FOLDER,
            self::DASHBOARD,
            self::BUDGET,
            self::COST_CANVAS,
            self::SAVED_COST_FILTER,
            self::VIRTUAL_TAG,
            self::BUSINESS_METRIC,
            self::SCENARIO_MODEL,
            self::SLO,
            self::SERVICE,
            self::RUNBOOK,
            self::STATUS_PAGE,
            self::PROBE,
            self::LOG_QUERY,
            self::QUERY_MONITOR,
        ];
    }
}
