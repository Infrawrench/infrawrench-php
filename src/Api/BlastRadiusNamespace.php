<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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
use Infrawrench\Sdk\Model\BlastRadiusReport;
use Infrawrench\Sdk\RequestOptions;

/** `$client->blastRadius` */
final class BlastRadiusNamespace extends ApiNamespace
{
    /**
     * What breaks if this resource is deleted
     *
     * An impact report for one resource, assembled from the dependency graph walked inbound,
     * network flow attribution, and the org objects that name the resource without depending on it
     * (dashboards, custom graphs, probes, status pages, metric alerts, leases, schedules, saved
     * log queries, workflows, and its recorded owner).
     *
     * The endpoint answers 200 with a partial report rather than failing when a source is
     * unavailable; `unchecked` says which, in prose.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/blast-radius
     *
     * Raises on 400: Missing resourceId
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): BlastRadiusReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/blast-radius',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return BlastRadiusReport::fromArray(Coerce::toArray($data));
    }
}
