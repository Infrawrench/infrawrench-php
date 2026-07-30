<?php

/*
 * infrawrench/sdk v0.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.16.0).
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
use Infrawrench\Sdk\Model\Role;
use Infrawrench\Sdk\Model\RoleCreateRequest;
use Infrawrench\Sdk\Model\RoleUpdateRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->team->roles` */
final class TeamRolesNamespace extends ApiNamespace
{
    /**
     * Create a custom role
     *
     * _Requires permission: `team:role:write`._
     *
     * POST /api/org/{orgId}/team/roles
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(RoleCreateRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Role
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/team/roles',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Role::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a custom role (must have no members or pending invitations)
     *
     * _Requires permission: `team:role:write`._
     *
     * DELETE /api/org/{orgId}/team/roles/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 422: Bad request
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
                path: '/api/org/{orgId}/team/roles/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List roles (system + custom)
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/team/roles
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<Role>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/team/roles',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): Role => Role::fromArray(Coerce::toArray($item)));
    }

    /**
     * Edit a custom role
     *
     * _Requires permission: `team:role:write`._
     *
     * PATCH /api/org/{orgId}/team/roles/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 422: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, RoleUpdateRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Role
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/team/roles/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Role::fromArray(Coerce::toArray($data));
    }
}
