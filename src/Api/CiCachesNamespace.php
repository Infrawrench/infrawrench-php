<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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
use Infrawrench\Sdk\Model\CiCacheCleared;
use Infrawrench\Sdk\Model\CiCaches;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->caches` */
final class CiCachesNamespace extends ApiNamespace
{
    /**
     * Clear a repository's CI caches
     *
     * Deletes every branch's and pull request's `cache:` and `task-cache:` entries of one
     * repository. The next run of each job starts cold and saves again.
     *
     * _Requires permission: `ci:write`._
     *
     * DELETE /api/org/{orgId}/ci/caches/{installationId}/{repo}
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
    public function delete(string $installationId, string $repo, ?string $orgId = null, ?RequestOptions $options = null): CiCacheCleared
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ci/caches/{installationId}/{repo}',
                pathParams: ['orgId' => $orgId, 'installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return CiCacheCleared::fromArray(Coerce::toArray($data));
    }

    /**
     * The caches CI keeps for each repository
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/caches
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CiCaches
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/caches',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CiCaches::fromArray(Coerce::toArray($data));
    }
}
