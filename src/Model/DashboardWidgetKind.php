<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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
 * `cost_graph` stores its whole config inline — a one-off card. `cost_report` points at a saved
 * cost report by id, so editing the report updates every dashboard showing it. `cost_canvas`
 * points at a cost canvas by id (`{version: 1, canvasId}`) the same way. `realized_savings` shows
 * the org's realized savings report; its config is only a view choice (`grouping`: month | kind |
 * costCentre | account, and `months` back, 1–36).
 *
 * The values `DashboardWidgetKind` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class DashboardWidgetKind
{
    public const COST_GRAPH = 'cost_graph';
    public const COST_REPORT = 'cost_report';
    public const BUDGET = 'budget';
    public const CUSTOM_GRAPH = 'custom_graph';
    public const COST_CANVAS = 'cost_canvas';
    public const REALIZED_SAVINGS = 'realized_savings';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::COST_GRAPH,
            self::COST_REPORT,
            self::BUDGET,
            self::CUSTOM_GRAPH,
            self::COST_CANVAS,
            self::REALIZED_SAVINGS,
        ];
    }
}
