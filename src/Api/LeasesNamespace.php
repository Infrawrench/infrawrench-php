<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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
use Infrawrench\Sdk\Model\ResourceLease;
use Infrawrench\Sdk\Model\ResourceLeaseCreate;
use Infrawrench\Sdk\Model\ResourceLeaseList;
use Infrawrench\Sdk\Model\ResourceLeaseLookup;
use Infrawrench\Sdk\Model\ResourceLeaseUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->leases` */
final class LeasesNamespace extends ApiNamespace
{
    /**
     * Cancel a lease
     *
     * Stop the countdown — the resource stays, the lease goes `canceled` and leaves the expiry
     * radar. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/leases/{leaseId}/cancel
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function cancel(string $leaseId, ?string $orgId = null, ?RequestOptions $options = null): ResourceLease
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leases/{leaseId}/cancel',
                pathParams: ['orgId' => $orgId, 'leaseId' => $leaseId],
            ),
            $options,
        );

        return ResourceLease::fromArray(Coerce::toArray($data));
    }

    /**
     * Create a resource lease
     *
     * Attach an expiry to a resource — 'give me a test cluster for 3 days'. One lease per resource
     * (an active lease conflicts; a terminal one is replaced). `autoDelete: true` opts into
     * deletion at expiry — the poller announces it twice first, defers during change freezes, and
     * requires the caller to hold `resources:delete`. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/leases
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The resource already has an active lease
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?ResourceLeaseCreate $body = null, ?RequestOptions $options = null): ResourceLease
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/leases',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ResourceLease::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a lease row
     *
     * Remove the lease record entirely (including terminal rows). The resource is not touched.
     * Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/leases/{leaseId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $leaseId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/leases/{leaseId}',
                pathParams: ['orgId' => $orgId, 'leaseId' => $leaseId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List resource leases
     *
     * Every lease in the organization, soonest deadline first. Active leases also appear on the
     * expiry radar (`GET /expiring`) as kind `lease` items, so the owner is nagged through the
     * existing expiry alerts.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/leases
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ResourceLeaseList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/leases',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ResourceLeaseList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one resource's lease
     *
     * The (unique) lease on a resource, whatever its status, or null.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/leases/resource
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resource(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): ResourceLeaseLookup
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/leases/resource',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return ResourceLeaseLookup::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a lease
     *
     * Edit the deadline, the auto-delete opt-in and/or the note of an active lease. Changing the
     * deadline or the auto-delete flag re-arms the two-announcement schedule. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/leases/{leaseId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $leaseId, ?string $orgId = null, ?ResourceLeaseUpdate $body = null, ?RequestOptions $options = null): ResourceLease
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/leases/{leaseId}',
                pathParams: ['orgId' => $orgId, 'leaseId' => $leaseId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ResourceLease::fromArray(Coerce::toArray($data));
    }
}
