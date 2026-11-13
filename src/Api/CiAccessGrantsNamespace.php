<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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
use Infrawrench\Sdk\Model\CiResourceGrant;
use Infrawrench\Sdk\Model\CiResourceGrantInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->access->grants` */
final class CiAccessGrantsNamespace extends ApiNamespace
{
    /**
     * Grant CI jobs a resource's outputs
     *
     * Pipelines read them as `${{ resources.<ciName>.<output> }}` in `env:`, or all at once with
     * `env-from: [<ciName>]`, read fresh for every run. Only for the listed repositories and
     * branches, and never for a fork's pull request.
     *
     * _Requires permission: `ci-access:write`._
     *
     * POST /api/org/{orgId}/ci/access/grants
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CiResourceGrantInput $body, ?string $orgId = null, ?RequestOptions $options = null): CiResourceGrant
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/access/grants',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CiResourceGrant::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove a resource grant
     *
     * _Requires permission: `ci:write`._
     *
     * DELETE /api/org/{orgId}/ci/access/grants/{grantId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $grantId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ci/access/grants/{grantId}',
                pathParams: ['orgId' => $orgId, 'grantId' => $grantId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Change a resource grant
     *
     * _Requires permission: `ci-access:write`._
     *
     * PUT /api/org/{orgId}/ci/access/grants/{grantId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $grantId, CiResourceGrantInput $body, ?string $orgId = null, ?RequestOptions $options = null): CiResourceGrant
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ci/access/grants/{grantId}',
                pathParams: ['orgId' => $orgId, 'grantId' => $grantId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CiResourceGrant::fromArray(Coerce::toArray($data));
    }
}
