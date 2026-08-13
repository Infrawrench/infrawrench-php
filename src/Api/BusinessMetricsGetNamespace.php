<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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
use Infrawrench\Sdk\Model\BusinessMetric;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics->get` */
final class BusinessMetricsGetNamespace extends ApiNamespace
{
    /**
     * List business metrics
     *
     * The organization's declared denominators, by key, each with the range of days it has values
     * for.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{metrics: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get a business metric
     *
     * `id` accepts either the metric's id or its key.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics/{id}
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdBusinessMetricsId(string $id, ?string $orgId = null, ?RequestOptions $options = null): BusinessMetric
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return BusinessMetric::fromArray(Coerce::toArray($data));
    }
}
