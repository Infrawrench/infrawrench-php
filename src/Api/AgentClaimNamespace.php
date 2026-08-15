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
use Infrawrench\Sdk\Model\AgentClaimLookup;
use Infrawrench\Sdk\Model\AgentClaimLookupRequest;
use Infrawrench\Sdk\Model\AgentClaimRequest;
use Infrawrench\Sdk\Model\AgentClaimResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agent->claim` */
final class AgentClaimNamespace extends ApiNamespace
{
    /**
     * Confirm a claim, binding the workspace to the signed-in user
     *
     * The code is re-resolved here rather than trusting a registration id from the lookup, so the
     * lookup cannot be used as an oracle. Rate limited per user.
     *
     * POST /api/agent/claim
     *
     * Raises on 400: Bad code, already claimed, revoked, or a merge with no valid target
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: The merge would put a free target organization over its plan limits
     *
     * Raises on 403: You lack the permission the merge needs in the target organization
     * (`accounts:write`, plus `costs:write` when moving history).
     *
     * Raises on 429: Too many attempts
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?AgentClaimRequest $body = null, ?RequestOptions $options = null): AgentClaimResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent/claim',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AgentClaimResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Resolve a user code so the claim page can show what is being claimed
     *
     * A POST rather than a GET with the code in the path: the code is a live bearer secret for 15
     * minutes, and a URL lands in history, in `Referer`, and in access logs. Rate limited per
     * user.
     *
     * POST /api/agent/claim/lookup
     *
     * Raises on 400: Missing, malformed, or expired code
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 404: The workspace no longer exists
     *
     * Raises on 429: Too many attempts
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function lookup(?AgentClaimLookupRequest $body = null, ?RequestOptions $options = null): AgentClaimLookup
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/agent/claim/lookup',
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AgentClaimLookup::fromArray(Coerce::toArray($data));
    }
}
