<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
use Infrawrench\Sdk\Model\WorkflowSecret;
use Infrawrench\Sdk\Model\WorkflowSecretCreate;
use Infrawrench\Sdk\Model\WorkflowSecretUpdate;
use Infrawrench\Sdk\Model\WorkflowSecretValueWrite;
use Infrawrench\Sdk\RequestOptions;

/** `$client->workflowSecrets` */
final class WorkflowSecretsNamespace extends ApiNamespace
{
    /**
     * Create workflow secret metadata
     *
     * Creates metadata without a value. Write the value separately through the write-only value
     * endpoint.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/workflow-secrets
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(WorkflowSecretCreate $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowSecret
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflow-secrets',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowSecret::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a workflow secret
     *
     * Also removes every workflow assignment through database cascades.
     *
     * _Requires permission: `secrets:write`._
     *
     * DELETE /api/org/{orgId}/workflow-secrets/{id}
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow secret id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/workflow-secrets/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List reusable workflow secrets
     *
     * Returns metadata and hasValue only; plaintext values are never returned.
     *
     * _Requires permission: `secrets:read`._
     *
     * GET /api/org/{orgId}/workflow-secrets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<WorkflowSecret>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflow-secrets',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): WorkflowSecret => WorkflowSecret::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update workflow secret metadata
     *
     * _Requires permission: `secrets:write`._
     *
     * PATCH /api/org/{orgId}/workflow-secrets/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string $id Workflow secret id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, WorkflowSecretUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowSecret
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/workflow-secrets/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowSecret::fromArray(Coerce::toArray($data));
    }

    /**
     * Write a workflow secret value
     *
     * Write-only. The response contains metadata and hasValue, never the supplied plaintext.
     *
     * _Requires permission: `secrets:write`._
     *
     * PUT /api/org/{orgId}/workflow-secrets/{id}/value
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow secret id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function value(string $id, WorkflowSecretValueWrite $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowSecret
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/workflow-secrets/{id}/value',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowSecret::fromArray(Coerce::toArray($data));
    }
}
