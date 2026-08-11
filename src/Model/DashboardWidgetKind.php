<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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
 * cost report by id, so editing the report updates every dashboard showing it.
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
        ];
    }
}
