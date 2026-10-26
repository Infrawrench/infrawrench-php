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
use Infrawrench\Sdk\Model\AgentLinkApprove;
use Infrawrench\Sdk\Model\AgentLinkCode;
use Infrawrench\Sdk\Model\AgentLinkLookup;
use Infrawrench\Sdk\Model\AgentLinkRequest;
use Infrawrench\Sdk\Model\AgentLinkRequestStarted;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agentLinks->requests` */
final class AgentLinksRequestsNamespace extends ApiNamespace
{
    /**
     * Approve a link request into an organization
     *
     * Session only. Needs `team:invite` in the organization; `scopes` (the ceiling) must be within
     * what you hold there, break-glass elevation excluded, minus permissions no agent may hold.
     *
     * POST /api/agent-links/requests/approve
     *
     * Raises on 400: Bad code, or `scope_not_allowed`
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: You lack `team:invite` there
     *
     * Raises on 409: Already decided or expired
     *
     * Raises on 429: Too many attempts
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(?AgentLinkApprove $body = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-links/requests/approve',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Start linking a platform (device flow)
     *
     * Unauthenticated, rate limited per source address.
     *
     * POST /api/agent-links/requests
     *
     * Raises on 400: Malformed platform, label or scopes
     *
     * Raises on 429: Too many requests from this address
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?AgentLinkRequest $body = null, ?RequestOptions $options = null): AgentLinkRequestStarted
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-links/requests',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AgentLinkRequestStarted::fromArray(Coerce::toArray($data));
    }

    /**
     * Deny a link request
     *
     * POST /api/agent-links/requests/deny
     *
     * Raises on 400: Bad code
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deny(?AgentLinkCode $body = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-links/requests/deny',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Resolve a user code for the approval page
     *
     * Session only. A POST with the code in the body rather than a query string: the code is a
     * live bearer secret. Rate limited per user.
     *
     * POST /api/agent-links/requests/lookup
     *
     * Raises on 400: Malformed, unknown or expired code
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 429: Too many attempts
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function lookup(?AgentLinkCode $body = null, ?RequestOptions $options = null): AgentLinkLookup
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-links/requests/lookup',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AgentLinkLookup::fromArray(Coerce::toArray($data));
    }

    /**
     * Poll a link request
     *
     * POST /api/agent-links/requests/token
     *
     * Raises on 429: Polling faster than `interval`: `{ error: "slow_down" }`
     *
     * @param array{deviceCode: string}|null $body
     * @return array{status: 'pending'|'denied'|'expired'}|array{status: 'approved', credential: string, link: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function token(?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent-links/requests/token',
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return $data;
    }
}
