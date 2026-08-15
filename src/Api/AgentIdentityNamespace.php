<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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
use Infrawrench\Sdk\Model\AgentClaimStarted;
use Infrawrench\Sdk\Model\AgentIdentity;
use Infrawrench\Sdk\Model\AgentRegisterRequest;
use Infrawrench\Sdk\Model\RegisteredAgent;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agent->identity` */
final class AgentIdentityNamespace extends ApiNamespace
{
    /**
     * Start the claim ceremony and mint a user code
     *
     * Returns a code to show the user together with the verification URL. Replaces any code
     * already outstanding for this registration.
     *
     * POST /api/agent/identity/claim
     *
     * Raises on 400: Already claimed
     *
     * Raises on 401: Unknown or revoked credential
     *
     * Raises on 403: Registration revoked
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function claim(?RequestOptions $options = null): AgentClaimStarted
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent/identity/claim',
            ),
            $options,
        );

        return AgentClaimStarted::fromArray(Coerce::toArray($data));
    }

    /**
     * Open an anonymous registration and a 24-hour trial workspace
     *
     * Requires no authentication — this is how a client with no credentials gets one. Rate limited
     * per source address. The workspace it opens is deleted 24 hours later unless a person
     * completes the claim ceremony.
     *
     * POST /api/agent/identity
     *
     * Raises on 429: Too many registrations from this address
     *
     * Raises on 500: Could not open a workspace
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?AgentRegisterRequest $body = null, ?RequestOptions $options = null): RegisteredAgent
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent/identity',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return RegisteredAgent::fromArray(Coerce::toArray($data));
    }

    /**
     * Poll this registration's claim status and time remaining
     *
     * GET /api/agent/identity
     *
     * Raises on 401: Unknown or revoked credential
     *
     * Raises on 404: Unknown registration
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?RequestOptions $options = null): AgentIdentity
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/agent/identity',
            ),
            $options,
        );

        return AgentIdentity::fromArray(Coerce::toArray($data));
    }
}
