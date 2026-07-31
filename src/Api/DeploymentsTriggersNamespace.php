<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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
use Infrawrench\Sdk\Model\DeployTrigger;
use Infrawrench\Sdk\Model\DeployTriggerInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->deployments->triggers` */
final class DeploymentsTriggersNamespace extends ApiNamespace
{
    /**
     * Deploy an environment whenever a branch moves
     *
     * Arming a trigger records the branch's current commit WITHOUT deploying it — the trigger
     * fires on the next push, not on the state at the moment it was created. The environment is
     * validated against the Infrafile at that branch head, so a typo fails here rather than
     * silently never firing.
     *
     * _Requires permission: `deployments:write`._
     *
     * POST /api/org/{orgId}/deployments/triggers
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?DeployTriggerInput $body = null, ?RequestOptions $options = null): DeployTrigger
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/deployments/triggers',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DeployTrigger::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a deploy trigger
     *
     * _Requires permission: `deployments:write`._
     *
     * DELETE /api/org/{orgId}/deployments/triggers/{id}
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
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
                path: '/api/org/{orgId}/deployments/triggers/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List deploy-on-push triggers
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/deployments/triggers
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<DeployTrigger>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/deployments/triggers',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): DeployTrigger => DeployTrigger::fromArray(Coerce::toArray($item)));
    }

    /**
     * Enable or disable a deploy trigger
     *
     * _Requires permission: `deployments:write`._
     *
     * PATCH /api/org/{orgId}/deployments/triggers/{id}
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{enabled: bool}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): DeployTrigger
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/deployments/triggers/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return DeployTrigger::fromArray(Coerce::toArray($data));
    }
}
