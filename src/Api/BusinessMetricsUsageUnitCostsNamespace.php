<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

/** `$client->businessMetrics->usageUnitCosts` */
final class BusinessMetricsUsageUnitCostsNamespace extends ApiNamespace
{
    /**
     * Query cost per usage unit
     *
     * Spend divided by the usage quantity providers report in one `usageUnit`, with no business
     * metric involved. Both halves come from the same cost rows (those reported in that unit), so
     * the numerator is exactly the spend that bought the denominator. A bucket with no usage is a
     * gap (`no_usage`), never 0. Labels do not apply.
     *
     * POST /api/org/{orgId}/business-metrics/usage-unit-costs
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(UnitCostQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): UnitCostQueryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/usage-unit-costs',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return UnitCostQueryResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Export cost per usage unit as a file
     *
     * The query `POST /business-metrics/usage-unit-costs` answers, as CSV or NDJSON. One row per
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
     * POST /api/org/{orgId}/business-metrics/usage-unit-costs/export
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function export(UnitCostExportRequest $body, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/usage-unit-costs/export',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
