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
use Infrawrench\Sdk\Model\DefaultDashboardResolution;
use Infrawrench\Sdk\Model\SetDefaultDashboardRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->default->me` */
final class DashboardsDefaultMeNamespace extends ApiNamespace
{
    /**
     * Clear my default dashboard
     *
     * _Requires permission: `dashboards:read`._
     *
     * DELETE /api/org/{orgId}/dashboards/default/me
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(?string $orgId = null, ?RequestOptions $options = null): DefaultDashboardResolution
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/dashboards/default/me',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DefaultDashboardResolution::fromArray(Coerce::toArray($data));
    }

    /**
     * Set my default dashboard
     *
     * Overrides the role and organization defaults for the caller in this organization. The
     * dashboard must be one the caller can open.
     *
     * _Requires permission: `dashboards:read`._
     *
     * PUT /api/org/{orgId}/dashboards/default/me
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(SetDefaultDashboardRequest $body, ?string $orgId = null, ?RequestOptions $options = null): DefaultDashboardResolution
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/dashboards/default/me',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DefaultDashboardResolution::fromArray(Coerce::toArray($data));
    }
}
