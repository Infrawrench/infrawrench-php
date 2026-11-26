<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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
use Infrawrench\Sdk\Model\ResourceRunwayResponse;
use Infrawrench\Sdk\Model\RunwayListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->quotas->runway` */
final class QuotasRunwayNamespace extends ApiNamespace
{
    /**
     * List capacity runway across the organization's resources
     *
     * Every usage a plugin declares on a resource type (a disk's used bytes against its size, a
     * database against its plan's storage cap, connections against `max_connections`, a monthly
     * allowance of compute hours or sends) with when it reaches its limit at the current rate,
     * soonest first. Monthly allowances report the usage projected at the end of the billing cycle
     * instead of a far-off crossing. A read over stored readings: the sync records each declared
     * usage hourly, so no provider API calls are made here.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/quotas/runway
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): RunwayListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/quotas/runway',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return RunwayListResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one resource's capacity runway with its readings
     *
     * The runway rows for one resource, each with the readings the projection used, for the
     * resource page's runway chart. An empty `rows` means the resource's type declares no usage,
     * or no reading with a resolvable limit has been recorded yet.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/quotas/runway/resource
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resource(string $resourceId, ?string $orgId = null, ?RequestOptions $options = null): ResourceRunwayResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/quotas/runway/resource',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return ResourceRunwayResponse::fromArray(Coerce::toArray($data));
    }
}
