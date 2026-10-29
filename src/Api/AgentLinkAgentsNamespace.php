<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
use Infrawrench\Sdk\Model\CreatePlatformAgent;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\PatchPlatformAgent;
use Infrawrench\Sdk\Model\PlatformAgent;
use Infrawrench\Sdk\Model\PlatformAgentEnvelope;
use Infrawrench\Sdk\Model\PlatformAgentWithCredential;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agentLink->agents` */
final class AgentLinkAgentsNamespace extends ApiNamespace
{
    /**
     * Create an agent with its own `iwa_` credential
     *
     * POST /api/agent-link/agents
     *
     * Raises on 400: `scope_not_allowed` (with `scopes`), `invalid_provider`, or malformed
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * Raises on 403: The approving person no longer exists
     *
     * Raises on 409: `exists`: a live agent with this `externalId` (with `agentId`)
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?CreatePlatformAgent $body = null, ?RequestOptions $options = null): PlatformAgentWithCredential
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-link/agents',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PlatformAgentWithCredential::fromArray(Coerce::toArray($data));
    }

    /**
     * Revoke an agent (idempotent; the row is kept for the audit log)
     *
     * DELETE /api/agent-link/agents/{id}
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * Raises on 404: Not an agent of this link
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/agent-link/agents/{id}',
                pathParams: ['id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List the agents this link made, newest first, revoked included
     *
     * GET /api/agent-link/agents
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * @return list<PlatformAgent>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/agent-link/agents',
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PlatformAgent => PlatformAgent::fromArray(Coerce::toArray($item)));
    }

    /**
     * Replace an agent's credential; the old one stops working immediately
     *
     * POST /api/agent-link/agents/{id}/rotate
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * Raises on 404: Not an agent of this link, or revoked
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rotate(string $id, ?RequestOptions $options = null): PlatformAgentWithCredential
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-link/agents/{id}/rotate',
                pathParams: ['id' => $id],
            ),
            $options,
        );

        return PlatformAgentWithCredential::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit an agent's label, scopes or providers
     *
     * PATCH /api/agent-link/agents/{id}
     *
     * Raises on 400: `scope_not_allowed`, `invalid_provider`, or malformed
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * Raises on 404: Not an agent of this link, or revoked
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?PatchPlatformAgent $body = null, ?RequestOptions $options = null): PlatformAgentEnvelope
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/agent-link/agents/{id}',
                pathParams: ['id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PlatformAgentEnvelope::fromArray(Coerce::toArray($data));
    }
}
