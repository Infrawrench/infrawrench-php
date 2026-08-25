<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\EnvironmentInstance;
use Infrawrench\Sdk\Model\EnvironmentInstanceList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->environments->instances` */
final class EnvironmentsInstancesNamespace extends ApiNamespace
{
    /**
     * Forget a torn-down environment
     *
     * Removes the record. Refuses while the instance still owns resources — the row is the only
     * thing that knows they exist. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/environments/instances/{instanceId}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The environment is still live — tear it down first
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $instanceId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/environments/instances/{instanceId}',
                pathParams: ['orgId' => $orgId, 'instanceId' => $instanceId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List environment instances
     *
     * Newest first. Reading this also reconciles instances past their deadline against what the
     * lease pass already deleted, so an environment whose resources are all gone stops reporting
     * itself as running.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environments/instances
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): EnvironmentInstanceList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environments/instances',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return EnvironmentInstanceList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get an environment instance
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environments/instances/{instanceId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdEnvironmentsInstancesInstanceId(string $instanceId, ?string $orgId = null, ?RequestOptions $options = null): EnvironmentInstance
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environments/instances/{instanceId}',
                pathParams: ['orgId' => $orgId, 'instanceId' => $instanceId],
            ),
            $options,
        );

        return EnvironmentInstance::fromArray(Coerce::toArray($data));
    }

    /**
     * Tear an environment down now
     *
     * Deletes every created member through the ordinary `deleteResource` path, in reverse creation
     * order. Idempotent: a member already gone, a resource the provider answers 404 for, and an
     * instance already torn down all succeed quietly, so this is safe to retry. Blocked by an
     * active change freeze. Audit-logged.
     *
     * _Requires permission: `resources:delete`._
     *
     * POST /api/org/{orgId}/environments/instances/{instanceId}/teardown
     *
     * Raises on 404: Not found
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function teardown(string $instanceId, ?string $orgId = null, ?RequestOptions $options = null): EnvironmentInstance
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/environments/instances/{instanceId}/teardown',
                pathParams: ['orgId' => $orgId, 'instanceId' => $instanceId],
            ),
            $options,
        );

        return EnvironmentInstance::fromArray(Coerce::toArray($data));
    }
}
