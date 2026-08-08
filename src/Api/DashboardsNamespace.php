<?php

/*
 * infrawrench/sdk v0.44.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.44.0).
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
use Infrawrench\Sdk\Model\Dashboard;
use Infrawrench\Sdk\Model\DashboardFull;
use Infrawrench\Sdk\Model\DashboardWithPins;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ProbeRequest;
use Infrawrench\Sdk\Model\ProbeStatus;
use Infrawrench\Sdk\Model\ReorderRequest;
use Infrawrench\Sdk\Model\UnpinRequest;
use Infrawrench\Sdk\Model\ValidateTabsRequest;
use Infrawrench\Sdk\Model\ValidateTabsResponse;
use Infrawrench\Sdk\Model\WorkflowPinRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards` */
final class DashboardsNamespace extends ApiNamespace
{
    /** `$client->dashboards->default` */
    public readonly DashboardsDefaultNamespace $default;

    /** `$client->dashboards->pin` */
    public readonly DashboardsPinNamespace $pin;

    /** `$client->dashboards->widgets` */
    public readonly DashboardsWidgetsNamespace $widgets;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->default = new DashboardsDefaultNamespace($this->transport);
        $this->pin = new DashboardsPinNamespace($this->transport);
        $this->widgets = new DashboardsWidgetsNamespace($this->transport);
    }

    /**
     * Create a dashboard
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/dashboards
     *
     * @param array{name: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(array $body, ?string $orgId = null, ?RequestOptions $options = null): DashboardFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return DashboardFull::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a dashboard
     *
     * Cannot delete the default dashboard.
     *
     * _Requires permission: `dashboards:write`._
     *
     * DELETE /api/org/{orgId}/dashboards/{id}
     *
     * Raises on 400: Bad request
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
                path: '/api/org/{orgId}/dashboards/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a dashboard with its pins
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/dashboards/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): DashboardWithPins
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return DashboardWithPins::fromArray(Coerce::toArray($data));
    }

    /**
     * List dashboards
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/dashboards
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<Dashboard>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): Dashboard => Dashboard::fromArray(Coerce::toArray($item)));
    }

    /**
     * Read cached stats/metrics for dashboard cards
     *
     * _Requires permission: `dashboards:read`._
     *
     * POST /api/org/{orgId}/dashboards/probe
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, ProbeStatus>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function probe(ProbeRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/probe',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapValues($data, static fn (mixed $item): ProbeStatus => ProbeStatus::fromArray(Coerce::toArray($item)));
    }

    /**
     * Rename a dashboard
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/dashboards/{id}/rename
     *
     * @param array{name: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rename(string $id, array $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/{id}/rename',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Reorder dashboard cards
     *
     * Persists the order of a dashboard's grid. Pass `cards` to order resource pins, workflow
     * pins, and widgets as one sequence; `resourceIds` orders resource pins alone.
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/dashboards/{id}/reorder
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reorder(string $id, ReorderRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/{id}/reorder',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Unpin a resource
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/dashboards/unpin
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function unpin(UnpinRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/unpin',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Validate workspace tab targets still exist
     *
     * _Requires permission: `dashboards:read`._
     *
     * POST /api/org/{orgId}/dashboards/validate-tabs
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function validateTabs(ValidateTabsRequest $body, ?string $orgId = null, ?RequestOptions $options = null): ValidateTabsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/validate-tabs',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ValidateTabsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Pin a workflow's metrics to a dashboard
     *
     * POST /api/org/{orgId}/dashboards/workflow-pin
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function workflowPin(WorkflowPinRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/workflow-pin',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Unpin a workflow from a dashboard
     *
     * POST /api/org/{orgId}/dashboards/workflow-unpin
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function workflowUnpin(WorkflowPinRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/workflow-unpin',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
