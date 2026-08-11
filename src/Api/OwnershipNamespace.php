<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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
use Infrawrench\Sdk\Model\OwnerCandidateListResponse;
use Infrawrench\Sdk\Model\ResourceOwnership;
use Infrawrench\Sdk\Model\ResourceOwnershipEnvelope;
use Infrawrench\Sdk\Model\ResourceOwnershipListResponse;
use Infrawrench\Sdk\Model\ResourceOwnershipPatch;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ownership` */
final class OwnershipNamespace extends ApiNamespace
{
    /**
     * Clear a resource's ownership
     *
     * Removes the ownership record. The resource itself is untouched.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/ownership
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ownership',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List resource ownership records
     *
     * Every ownership record in the organization — owner, purpose and authorizing ticket, per
     * resource. Only resources somebody has recorded something about appear; an absent record
     * means the resource is unowned.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/ownership
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ResourceOwnershipListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ownership',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ResourceOwnershipListResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List people an owner can be set to
     *
     * Org members, as a minimal id/name/email projection for the owner picker. Requires only
     * `resources:read`, deliberately not `team:read`: recording who owns a resource must not be
     * reserved for whoever can also read roles and membership.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/ownership/members
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function members(?string $orgId = null, ?RequestOptions $options = null): OwnerCandidateListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ownership/members',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OwnerCandidateListResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one resource's ownership
     *
     * The ownership record for a single resource, or null when none is recorded.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/ownership/resource
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resource(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): ResourceOwnershipEnvelope
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ownership/resource',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return ResourceOwnershipEnvelope::fromArray(Coerce::toArray($data));
    }

    /**
     * Set a resource's ownership
     *
     * Upsert keyed by `resourceId` — ownership is a property of the resource, so there is no
     * separate create and update. Omitted fields keep their value and `null` clears one. Clearing
     * every field removes the record entirely and the response is `null`, which is the new truth
     * rather than an empty record. An `ownerUserId` must be a member of this organization:
     * ownership that looks routable but reaches nobody is worse than none.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/ownership
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?ResourceOwnershipPatch $body = null, ?RequestOptions $options = null): ?ResourceOwnership
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ownership',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): ResourceOwnership => ResourceOwnership::fromArray(Coerce::toArray($value)));
    }
}
