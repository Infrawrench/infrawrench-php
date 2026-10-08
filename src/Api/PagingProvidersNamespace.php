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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\PagingDestinationsResponse;
use Infrawrench\Sdk\Model\PagingEventsResponse;
use Infrawrench\Sdk\Model\PagingProviderSettingsInput;
use Infrawrench\Sdk\Model\PagingProviderSettingsResult;
use Infrawrench\Sdk\Model\PagingProvidersResponse;
use Infrawrench\Sdk\Model\PagingSyncResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->pagingProviders` */
final class PagingProvidersNamespace extends ApiNamespace
{
    /** `$client->pagingProviders->onCall` */
    public readonly PagingProvidersOnCallNamespace $onCall;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->onCall = new PagingProvidersOnCallNamespace($this->transport);
    }

    /**
     * List the targets and on-call sources a routing rule can name
     *
     * Listed live from each provider, so a destination is picked by name. A failure is reported
     * per account in `error` rather than failing the response.
     *
     * GET /api/org/{orgId}/paging-providers/destinations
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
    public function destinations(?string $orgId = null, ?RequestOptions $options = null): PagingDestinationsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/paging-providers/destinations',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PagingDestinationsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List upstream alerts Infrawrench opened
     *
     * One row per (account, target, dedup key): a trigger, its acknowledgement and its resolution
     * are one alert upstream. `pendingAction` is set while a send is queued or being retried.
     *
     * GET /api/org/{orgId}/paging-providers/events
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
    public function events(?string $orgId = null, ?int $limit = null, ?RequestOptions $options = null): PagingEventsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/paging-providers/events',
                pathParams: ['orgId' => $orgId],
                query: ['limit' => $limit],
            ),
            $options,
        );

        return PagingEventsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List paging provider accounts and their settings
     *
     * GET /api/org/{orgId}/paging-providers
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
    public function get(?string $orgId = null, ?RequestOptions $options = null): PagingProvidersResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/paging-providers',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PagingProvidersResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Configure incident mirroring for a paging provider account
     *
     * Turning inbound on with a `managed` webhook subscribes one through the provider's API;
     * turning it off removes the subscription and forgets the mirrored incidents. A webhook that
     * cannot be subscribed is reported in `warning` and mirroring falls back to reconciling on a
     * timer.
     *
     * PUT /api/org/{orgId}/paging-providers/{accountId}/settings
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
    public function settings(string $accountId, ?string $orgId = null, ?PagingProviderSettingsInput $body = null, ?RequestOptions $options = null): PagingProviderSettingsResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/paging-providers/{accountId}/settings',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PagingProviderSettingsResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Reconcile an account's incidents now
     *
     * POST /api/org/{orgId}/paging-providers/{accountId}/sync
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
    public function sync(string $accountId, ?string $orgId = null, ?RequestOptions $options = null): PagingSyncResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/paging-providers/{accountId}/sync',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
            ),
            $options,
        );

        return PagingSyncResult::fromArray(Coerce::toArray($data));
    }
}
