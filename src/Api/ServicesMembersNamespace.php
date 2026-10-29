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
use Infrawrench\Sdk\Model\ServiceDetail;
use Infrawrench\Sdk\Model\ServiceMembersRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->services->members` */
final class ServicesMembersNamespace extends ApiNamespace
{
    /**
     * Add members to a service
     *
     * Adds resources by hand. An excluded resource is put back. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/services/{serviceId}/members
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $serviceId, ?string $orgId = null, ?ServiceMembersRequest $body = null, ?RequestOptions $options = null): ServiceDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/services/{serviceId}/members',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ServiceDetail::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove a member from a service
     *
     * A hand-added member is removed; a rule-matched one is excluded, since the rule would
     * otherwise put it back. With `restore=1`, deletes an exclusion instead. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/services/{serviceId}/members/{resourceId}
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param '1'|null $restore Delete an exclusion instead.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $serviceId, string $resourceId, ?string $orgId = null, ?string $restore = null, ?RequestOptions $options = null): ServiceDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/services/{serviceId}/members/{resourceId}',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId, 'resourceId' => $resourceId],
                query: ['restore' => $restore],
            ),
            $options,
        );

        return ServiceDetail::fromArray(Coerce::toArray($data));
    }
}
