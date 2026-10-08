<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
use Infrawrench\Sdk\Model\PagingOnCallNowResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->pagingProviders->onCall` */
final class PagingProvidersOnCallNamespace extends ApiNamespace
{
    /**
     * Who is on call on a provider schedule or escalation policy
     *
     * Takes `team:read`, like the rotation preview. Each person is matched to an organization
     * member by email; `memberUserId` is null for somebody who is on call upstream but not a
     * member here.
     *
     * GET /api/org/{orgId}/paging-providers/{accountId}/on-call/{sourceId}
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
     * @param string $accountId A connected account whose plugin can page
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $accountId, string $sourceId, ?string $orgId = null, ?RequestOptions $options = null): PagingOnCallNowResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/paging-providers/{accountId}/on-call/{sourceId}',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId, 'sourceId' => $sourceId],
            ),
            $options,
        );

        return PagingOnCallNowResponse::fromArray(Coerce::toArray($data));
    }
}
