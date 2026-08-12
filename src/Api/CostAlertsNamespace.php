<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\CostAlert;
use Infrawrench\Sdk\Model\CostAlertInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costAlerts` */
final class CostAlertsNamespace extends ApiNamespace
{
    /** `$client->costAlerts->get` */
    public readonly CostAlertsGetNamespace $get;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new CostAlertsGetNamespace($this->transport);
    }

    /**
     * Create a change-based cost alert
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-alerts
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostAlertInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostAlert
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-alerts',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAlert::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost alert
     *
     * Soft delete. Fired events disappear from the org-wide event feed with it.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-alerts/{id}
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
                path: '/api/org/{orgId}/cost-alerts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List recently fired cost-alert events
     *
     * Newest first. Optionally scoped to one alert with ?alertId=; an unknown alertId is a 404,
     * distinct from an alert that simply has no events yet.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-alerts/events
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{events: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function events(?string $orgId = null, ?string $alertId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-alerts/events',
                pathParams: ['orgId' => $orgId],
                query: ['alertId' => $alertId, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Update a cost alert
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-alerts/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostAlertInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostAlert
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-alerts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAlert::fromArray(Coerce::toArray($data));
    }
}
