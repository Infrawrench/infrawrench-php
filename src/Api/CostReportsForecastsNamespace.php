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
use Infrawrench\Sdk\Model\CostForecast;
use Infrawrench\Sdk\Model\CostForecastInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReports->forecasts` */
final class CostReportsForecastsNamespace extends ApiNamespace
{
    /**
     * Add a named forecast to a report
     *
     * A forecast combines a baseline (the trend, or a driver metric's forecasted values times the
     * projected unit cost) with scenario models in priority order. Needs editor access to the
     * report.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-reports/{id}/forecasts
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, CostForecastInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostForecast
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-reports/{id}/forecasts',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostForecast::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a named forecast
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-reports/{id}/forecasts/{forecastId}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, string $forecastId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/cost-reports/{id}/forecasts/{forecastId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'forecastId' => $forecastId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List a report's named forecasts
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}/forecasts
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{forecasts: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports/{id}/forecasts',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Replace a named forecast
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-reports/{id}/forecasts/{forecastId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, string $forecastId, CostForecastInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostForecast
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-reports/{id}/forecasts/{forecastId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'forecastId' => $forecastId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostForecast::fromArray(Coerce::toArray($data));
    }
}
