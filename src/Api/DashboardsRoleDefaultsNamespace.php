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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\RoleDefaultDashboard;
use Infrawrench\Sdk\Model\SetDefaultDashboardRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->roleDefaults` */
final class DashboardsRoleDefaultsNamespace extends ApiNamespace
{
    /**
     * Clear a role's default dashboard
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/dashboards/role-defaults/{roleId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $roleId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/dashboards/role-defaults/{roleId}',
                pathParams: ['orgId' => $orgId, 'roleId' => $roleId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List each role's default dashboard
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/dashboards/role-defaults
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<RoleDefaultDashboard>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/role-defaults',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): RoleDefaultDashboard => RoleDefaultDashboard::fromArray(Coerce::toArray($item)));
    }

    /**
     * Set a role's default dashboard
     *
     * Members holding the role land on this dashboard unless they picked their own. Refused with
     * 422 when the role lacks `dashboards:read` or the dashboard is not shared with the role
     * (org-wide or by a role grant). Works for system and custom roles. Needs `org:settings:write`
     * (not `team:role:write`), so an API key can manage it.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/dashboards/role-defaults/{roleId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 422: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $roleId, SetDefaultDashboardRequest $body, ?string $orgId = null, ?RequestOptions $options = null): RoleDefaultDashboard
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/dashboards/role-defaults/{roleId}',
                pathParams: ['orgId' => $orgId, 'roleId' => $roleId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return RoleDefaultDashboard::fromArray(Coerce::toArray($data));
    }
}
