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
use Infrawrench\Sdk\Model\NetworkFlowReport;
use Infrawrench\Sdk\Model\NetworkFlowReportInput;
use Infrawrench\Sdk\Model\NetworkFlowReportRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->networkFlows->reports` */
final class NetworkFlowsReportsNamespace extends ApiNamespace
{
    /**
     * Create a network flow report
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/network-flows/reports
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(NetworkFlowReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): NetworkFlowReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/network-flows/reports',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return NetworkFlowReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a network flow report
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/network-flows/reports/{id}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/network-flows/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a network flow report
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows/reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): NetworkFlowReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return NetworkFlowReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List saved network flow reports
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows/reports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<NetworkFlowReport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows/reports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): NetworkFlowReport => NetworkFlowReport::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run a saved network flow report
     *
     * A relative date range resolves against today on every run.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/network-flows/reports/{id}/run
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): NetworkFlowReportRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/network-flows/reports/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return NetworkFlowReportRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a network flow report
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/network-flows/reports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, NetworkFlowReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): NetworkFlowReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/network-flows/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return NetworkFlowReport::fromArray(Coerce::toArray($data));
    }
}
