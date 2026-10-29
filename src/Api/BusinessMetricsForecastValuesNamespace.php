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
use Infrawrench\Sdk\Model\BusinessMetricForecastValuesInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics->forecastValues` */
final class BusinessMetricsForecastValuesNamespace extends ApiNamespace
{
    /**
     * Write forecasted metric values
     *
     * Re-sending a day restates it. Values must be non-negative.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/forecast-values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{written: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, BusinessMetricForecastValuesInput $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/forecast-values',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Delete forecasted metric values
     *
     * Removes planned days in `[from, to]`; omit both to clear every planned day.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/business-metrics/{id}/forecast-values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{deleted: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/business-metrics/{id}/forecast-values',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['from' => $from, 'to' => $to],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List a metric's forecasted values
     *
     * Planned values, kept apart from the reported actuals: no unit cost, threshold or coverage
     * figure ever reads them. Day order.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics/{id}/forecast-values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{values: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics/{id}/forecast-values',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['from' => $from, 'to' => $to],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
