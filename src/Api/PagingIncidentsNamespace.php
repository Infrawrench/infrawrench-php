<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
use Infrawrench\Sdk\Model\PagerIncident;
use Infrawrench\Sdk\Model\PagerIncidentsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->pagingIncidents` */
final class PagingIncidentsNamespace extends ApiNamespace
{
    /**
     * Acknowledge a provider incident
     *
     * Written to the provider as the acting member where the provider records who acted
     * (PagerDuty's `From` header), falling back to the account's default user. The returned state
     * is the provider's answer, not an assumption.
     *
     * POST /api/org/{orgId}/paging-incidents/{id}/acknowledge
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
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function acknowledge(string $id, ?string $orgId = null, ?RequestOptions $options = null): PagerIncident
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/paging-incidents/{id}/acknowledge',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return PagerIncident::fromArray(Coerce::toArray($data));
    }

    /**
     * List incidents mirrored from paging providers
     *
     * Only accounts with inbound mirroring turned on contribute. Open incidents by default;
     * `status=all` includes resolved ones. These are a provider's pages, distinct from incidents
     * declared in Infrawrench (`/incidents`).
     *
     * GET /api/org/{orgId}/paging-incidents
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
     * @param 'open'|'all'|null $status
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $status = null, ?RequestOptions $options = null): PagerIncidentsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/paging-incidents',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status],
            ),
            $options,
        );

        return PagerIncidentsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Resolve a provider incident
     *
     * Written to the provider as the acting member where the provider records who acted
     * (PagerDuty's `From` header), falling back to the account's default user. The returned state
     * is the provider's answer, not an assumption.
     *
     * POST /api/org/{orgId}/paging-incidents/{id}/resolve
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
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resolve(string $id, ?string $orgId = null, ?RequestOptions $options = null): PagerIncident
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/paging-incidents/{id}/resolve',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return PagerIncident::fromArray(Coerce::toArray($data));
    }
}
