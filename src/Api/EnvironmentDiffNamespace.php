<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
use Infrawrench\Sdk\Model\EnvironmentDiffResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->environmentDiff` */
final class EnvironmentDiffNamespace extends ApiNamespace
{
    /**
     * Compare two accounts' resource inventories
     *
     * Compares two accounts of the same provider — typically staging against production — over
     * already-synced state: which resource types exist in one and not the other, the per-type
     * count deltas, and the fields on which two corresponding resources disagree (instance class,
     * engine version, feature flags).
     *
     * Resources are paired by resource type plus name with environment words removed, so
     * `api-staging` lines up with `api-prod` without any naming convention to configure. By
     * default the comparison hides divergences that are artefacts of being two different resources
     * — ids, links, network addresses and timestamps — because every resource has different ones;
     * pass `includeIdentityFields=true` to see them.
     *
     * Read-only and cheap: no provider API calls are made, so results reflect the last sync.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environment-diff
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $a Baseline account id — by convention the environment that works.
     * @param string $b Compared account id. Must differ from `a` and use the same provider.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $resourceTypeId Compare one resource type only.
     * @param 'true'|'false'|null $includeIdentityFields Compare identity and timestamp fields too, instead of filtering them out.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $a, string $b, ?string $orgId = null, ?string $resourceTypeId = null, ?string $includeIdentityFields = null, ?RequestOptions $options = null): EnvironmentDiffResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environment-diff',
                pathParams: ['orgId' => $orgId],
                query: ['a' => $a, 'b' => $b, 'resourceTypeId' => $resourceTypeId, 'includeIdentityFields' => $includeIdentityFields],
            ),
            $options,
        );

        return EnvironmentDiffResponse::fromArray(Coerce::toArray($data));
    }
}
