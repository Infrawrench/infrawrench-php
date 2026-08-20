<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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
use Infrawrench\Sdk\Model\CustomGraphCheckRequest;
use Infrawrench\Sdk\Model\CustomGraphCheckResult;
use Infrawrench\Sdk\Model\CustomGraphFull;
use Infrawrench\Sdk\Model\CustomGraphInput;
use Infrawrench\Sdk\Model\CustomGraphRenderRequest;
use Infrawrench\Sdk\Model\CustomGraphRenderResult;
use Infrawrench\Sdk\Model\CustomGraphSummary;
use Infrawrench\Sdk\Model\CustomGraphUpdate;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->customGraphs` */
final class CustomGraphsNamespace extends ApiNamespace
{
    /**
     * Type-check custom-graph source without saving it
     *
     * _Requires permission: `dashboards:read`._
     *
     * POST /api/org/{orgId}/custom-graphs/check
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function check(CustomGraphCheckRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CustomGraphCheckResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-graphs/check',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomGraphCheckResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Create a custom graph (paid plan required)
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/custom-graphs
     *
     * Raises on 400: Bad request
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CustomGraphInput $body, ?string $orgId = null, ?RequestOptions $options = null): CustomGraphFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-graphs',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomGraphFull::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a custom graph (and its dashboard cards)
     *
     * _Requires permission: `dashboards:write`._
     *
     * DELETE /api/org/{orgId}/custom-graphs/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/custom-graphs/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a custom graph (including source)
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/custom-graphs/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CustomGraphFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-graphs/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CustomGraphFull::fromArray(Coerce::toArray($data));
    }

    /**
     * List custom graphs
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/custom-graphs
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CustomGraphSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-graphs',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CustomGraphSummary => CustomGraphSummary::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run the graph's script and return its render spec (paid plan required)
     *
     * _Requires permission: `dashboards:read`._
     *
     * POST /api/org/{orgId}/custom-graphs/{id}/render
     *
     * Raises on 400: Bad request
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function render(string $id, ?string $orgId = null, ?CustomGraphRenderRequest $body = null, ?RequestOptions $options = null): CustomGraphRenderResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-graphs/{id}/render',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return CustomGraphRenderResult::fromArray(Coerce::toArray($data));
    }

    /**
     * The ambient graph.d.ts for custom-graph source
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/custom-graphs/typings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function typings(?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-graphs/typings',
                pathParams: ['orgId' => $orgId],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Update a custom graph (paid plan required)
     *
     * _Requires permission: `dashboards:write`._
     *
     * PUT /api/org/{orgId}/custom-graphs/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CustomGraphUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): CustomGraphFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/custom-graphs/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomGraphFull::fromArray(Coerce::toArray($data));
    }
}
