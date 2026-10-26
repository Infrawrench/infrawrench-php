<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\AgentRegistration;
use Infrawrench\Sdk\Model\AgentRevoked;
use Infrawrench\Sdk\Model\PatchPlatformAgent;
use Infrawrench\Sdk\Model\PlatformAgentEnvelope;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agentRegistrations` */
final class AgentRegistrationsNamespace extends ApiNamespace
{
    /**
     * Revoke an agent registration
     *
     * The row is kept so audit entries naming this agent stay legible; its credential stops
     * working on the next request. Closed to agent credentials.
     *
     * _Requires permission: `team:invite`._
     *
     * DELETE /api/org/{orgId}/agent-registrations/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required: the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): AgentRevoked
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/agent-registrations/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return AgentRevoked::fromArray(Coerce::toArray($data));
    }

    /**
     * List the agent registrations acting in this organization
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/agent-registrations
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required: the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AgentRegistration>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/agent-registrations',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AgentRegistration => AgentRegistration::fromArray(Coerce::toArray($item)));
    }

    /**
     * Edit a platform agent's label, scopes or providers
     *
     * Platform agents only (`kind: platform`). Scopes must be within the link's current ceiling,
     * and you may only add scopes you hold yourself. Closed to agent credentials.
     *
     * _Requires permission: `team:invite`._
     *
     * PATCH /api/org/{orgId}/agent-registrations/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required: the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The agent or its link has been revoked
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?PatchPlatformAgent $body = null, ?RequestOptions $options = null): PlatformAgentEnvelope
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/agent-registrations/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PlatformAgentEnvelope::fromArray(Coerce::toArray($data));
    }
}
