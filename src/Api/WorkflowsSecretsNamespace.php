<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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
use Infrawrench\Sdk\Model\WorkflowSecretAssignment;
use Infrawrench\Sdk\Model\WorkflowSecretAssignmentInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->workflows->secrets` */
final class WorkflowsSecretsNamespace extends ApiNamespace
{
    /**
     * List a workflow's assigned secrets
     *
     * Returns assigned ids and metadata only, never values.
     *
     * _Requires permission: `secrets:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/secrets
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): WorkflowSecretAssignment
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}/secrets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return WorkflowSecretAssignment::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a workflow's secret assignments
     *
     * _Requires permission: `workflows:write`._
     *
     * PUT /api/org/{orgId}/workflows/{id}/secrets
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, WorkflowSecretAssignmentInput $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowSecretAssignment
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/workflows/{id}/secrets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowSecretAssignment::fromArray(Coerce::toArray($data));
    }
}
