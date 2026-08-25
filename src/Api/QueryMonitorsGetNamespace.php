<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\QueryMonitor;
use Infrawrench\Sdk\Model\QueryMonitorList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->queryMonitors->get` */
final class QueryMonitorsGetNamespace extends ApiNamespace
{
    /**
     * List query monitors
     *
     * GET /api/org/{orgId}/query-monitors
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): QueryMonitorList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/query-monitors',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return QueryMonitorList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one query monitor
     *
     * GET /api/org/{orgId}/query-monitors/{monitorId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdQueryMonitorsMonitorId(string $monitorId, ?string $orgId = null, ?RequestOptions $options = null): QueryMonitor
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/query-monitors/{monitorId}',
                pathParams: ['orgId' => $orgId, 'monitorId' => $monitorId],
            ),
            $options,
        );

        return QueryMonitor::fromArray(Coerce::toArray($data));
    }
}
