<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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
use Infrawrench\Sdk\Model\BusinessMetricValuesInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics->values` */
final class BusinessMetricsValuesNamespace extends ApiNamespace
{
    /**
     * Report metric values
     *
     * Write a batch of days. **Re-reporting a day restates it rather than accumulating**, which is
     * what makes a nightly job safe to retry. Nothing lands unless the whole batch validates, so a
     * bad row is a 400 rather than half a month restated. The same guarantees back
     * `infra.businessMetrics.write(...)` in a workflow — both go through one validator.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{written: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, BusinessMetricValuesInput $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/values',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List a metric's reported values
     *
     * Newest day first.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics/{id}/values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $limit Default 90.
     * @return array{values: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics/{id}/values',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['limit' => $limit],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
