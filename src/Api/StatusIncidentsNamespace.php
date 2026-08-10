<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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
use Infrawrench\Sdk\Model\OrgStatusIncidentsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->statusIncidents` */
final class StatusIncidentsNamespace extends ApiNamespace
{
    /**
     * Provider incidents overlapping your resources
     *
     * The "is it me or is it them?" feed. The poller watches each provider plugin's public status
     * feed (declared on its manifest — zero credentials, zero rate-limit risk), caches active
     * incidents, and this endpoint correlates them against the resources the organization holds:
     * an incident matches a resource when it is provider-wide, names the resource's region, or
     * names its resource type. Includes incidents resolved within the last 24 hours so recent
     * drift can still be correlated. Active incidents first, most severe first.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/status-incidents
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OrgStatusIncidentsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/status-incidents',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OrgStatusIncidentsResponse::fromArray(Coerce::toArray($data));
    }
}
