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

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Model\UnitCostExportRequest;
use Infrawrench\Sdk\Model\UnitCostQueryRequest;
use Infrawrench\Sdk\Model\UnitCostQueryResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics->unitCosts` */
final class BusinessMetricsUnitCostsNamespace extends ApiNamespace
{
    /**
     * Query unit costs or margin
     *
     * Divide spend by the metric, bucketed as asked. Three properties of the answer are worth
     * knowing before reading it:
     *
     * - **The ratio is computed at the requested bucket**, from a summed numerator and a summed
     * denominator: never a mean of daily ratios, which weights a quiet day as heavily as a peak
     * one. The same holds for `overallValue`.
     * - **A missing or non-positive denominator is a gap** (`value: null` with a `gap` reason),
     * never 0 and never infinite.
     * - **Currencies are never merged.** Spend in a currency with no stated rate keeps its own
     * series rather than being dropped or added to another.
     *
     * There is no spend `groupBy`: a per-group ratio needs a per-group denominator. Split by a
     * metric label with `groupByLabel` instead; in a ratio mode the label must be mapped to the
     * cost dimension its values name (`labelMappings` on the metric), so each label value's spend
     * is divided by its own volume.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/unit-costs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, UnitCostQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): UnitCostQueryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/unit-costs',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return UnitCostQueryResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Export unit costs or margin as a file
     *
     * The query `POST /business-metrics/{id}/unit-costs` answers, as CSV or NDJSON. One row per
     * bucket per series (and per label value when grouped), columns in this order: `bucket`,
     * `bucket_days`, `reported_days`, `partial`, `label_key`, `label_value`, `label_other`,
     * `currency`, `mode`, `scale`, `metric_key`, `metric_unit`, `usage_unit`, `cost` (summed
     * spend), `metric_value` (summed denominator, unscaled), `value` (the ratio, already scaled),
     * `absolute_margin`, `gap`. A gap is an **empty** `value` with its reason in `gap`, never 0,
     * and `partial` flags a bucket whose denominator covers only some of its days. Text cells
     * starting with `=`, `+`, `-` or `@` are prefixed with `'` so a spreadsheet does not run them.
     * NDJSON carries the same keys, with `null` for empty.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/unit-costs/export
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(string $id, UnitCostExportRequest $body, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/unit-costs/export',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
