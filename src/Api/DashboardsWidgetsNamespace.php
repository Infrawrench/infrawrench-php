<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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
use Infrawrench\Sdk\Model\CreateWidgetRequest;
use Infrawrench\Sdk\Model\DashboardWidgetFull;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\UpdateWidgetRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->widgets` */
final class DashboardsWidgetsNamespace extends ApiNamespace
{
    /**
     * Add a cost-graph or budget widget to a dashboard
     *
     * POST /api/org/{orgId}/dashboards/widgets
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CreateWidgetRequest $body, ?string $orgId = null, ?RequestOptions $options = null): DashboardWidgetFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/widgets',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DashboardWidgetFull::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove a widget from a dashboard
     *
     * DELETE /api/org/{orgId}/dashboards/widgets/{widgetId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $widgetId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/dashboards/widgets/{widgetId}',
                pathParams: ['orgId' => $orgId, 'widgetId' => $widgetId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a widget's title, config, or layout
     *
     * PATCH /api/org/{orgId}/dashboards/widgets/{widgetId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $widgetId, UpdateWidgetRequest $body, ?string $orgId = null, ?RequestOptions $options = null): DashboardWidgetFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/dashboards/widgets/{widgetId}',
                pathParams: ['orgId' => $orgId, 'widgetId' => $widgetId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DashboardWidgetFull::fromArray(Coerce::toArray($data));
    }
}
