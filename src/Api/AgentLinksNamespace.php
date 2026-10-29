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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\AgentLinkRevoked;
use Infrawrench\Sdk\Model\AgentLinkSummary;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agentLinks` */
final class AgentLinksNamespace extends ApiNamespace
{
    /** `$client->agentLinks->requests` */
    public readonly AgentLinksRequestsNamespace $requests;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->requests = new AgentLinksRequestsNamespace($this->transport);
    }

    /**
     * Revoke a platform link and every agent it made
     *
     * Closed to agent credentials.
     *
     * _Requires permission: `team:invite`._
     *
     * DELETE /api/org/{orgId}/agent-links/{id}
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
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): AgentLinkRevoked
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/agent-links/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return AgentLinkRevoked::fromArray(Coerce::toArray($data));
    }

    /**
     * List the platforms linked to this organization
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/agent-links
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
     * @return list<AgentLinkSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/agent-links',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AgentLinkSummary => AgentLinkSummary::fromArray(Coerce::toArray($item)));
    }
}
