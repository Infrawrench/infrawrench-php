<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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
use Infrawrench\Sdk\Model\ObjectSharing;
use Infrawrench\Sdk\Model\ObjectSharingInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ShareableObjectType;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sharing` */
final class SharingNamespace extends ApiNamespace
{
    /**
     * Reset an object's sharing to the default
     *
     * Removes every grant and the org-wide setting, so everyone in the organization can edit
     * again. Owner only. A report's creator remains its owner.
     *
     * DELETE /api/org/{orgId}/sharing/{objectType}/{objectId}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param ShareableObjectType::* $objectType
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $objectType, string $objectId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/sharing/{objectType}/{objectId}',
                pathParams: ['orgId' => $orgId, 'objectType' => $objectType, 'objectId' => $objectId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get an object's sharing
     *
     * Who can open or edit a cost report, report folder or dashboard. Needs viewer on the object
     * and the family's read permission (`costs:read` / `dashboards:read`).
     *
     * GET /api/org/{orgId}/sharing/{objectType}/{objectId}
     *
     * Raises on 404: Not found
     *
     * @param ShareableObjectType::* $objectType
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $objectType, string $objectId, ?string $orgId = null, ?RequestOptions $options = null): ObjectSharing
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/sharing/{objectType}/{objectId}',
                pathParams: ['orgId' => $orgId, 'objectType' => $objectType, 'objectId' => $objectId],
            ),
            $options,
        );

        return ObjectSharing::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace an object's sharing
     *
     * Replaces the org-wide default and every grant. Owner on the object plus the family's write
     * permission. At least one owner must remain.
     *
     * PUT /api/org/{orgId}/sharing/{objectType}/{objectId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param ShareableObjectType::* $objectType
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $objectType, string $objectId, ?string $orgId = null, ?ObjectSharingInput $body = null, ?RequestOptions $options = null): ObjectSharing
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/sharing/{objectType}/{objectId}',
                pathParams: ['orgId' => $orgId, 'objectType' => $objectType, 'objectId' => $objectId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ObjectSharing::fromArray(Coerce::toArray($data));
    }
}
