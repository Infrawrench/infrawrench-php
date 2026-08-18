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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\BusinessMetric;
use Infrawrench\Sdk\Model\BusinessMetricInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\UnitCostQueryRequest;
use Infrawrench\Sdk\Model\UnitCostQueryResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics` */
final class BusinessMetricsNamespace extends ApiNamespace
{
    /** `$client->businessMetrics->get` */
    public readonly BusinessMetricsGetNamespace $get;

    /** `$client->businessMetrics->values` */
    public readonly BusinessMetricsValuesNamespace $values;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new BusinessMetricsGetNamespace($this->transport);
        $this->values = new BusinessMetricsValuesNamespace($this->transport);
    }

    /**
     * Create a business metric
     *
     * Keys must be unique per organization among live metrics — they are how workflows and the CLI
     * address the metric. A key collision is a 409.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/business-metrics
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: A live metric already uses this key.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(BusinessMetricInput $body, ?string $orgId = null, ?RequestOptions $options = null): BusinessMetric
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return BusinessMetric::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a business metric
     *
     * Soft delete. Not refused when a dashboard card references the metric, unlike a saved cost
     * filter: a unit-cost card whose metric is gone fails its query and says so, whereas a card
     * that quietly reverted to plain spend would be a chart claiming to be something it is not.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/business-metrics/{id}
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/business-metrics/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Query unit costs or margin
     *
     * Divide spend by the metric, bucketed as asked. Three properties of the answer are worth
     * knowing before reading it:
     *
     * - **The ratio is computed at the requested bucket**, from a summed numerator and a summed
     * denominator — never a mean of daily ratios, which weights a quiet day as heavily as a peak
     * one. The same holds for `overallValue`.
     * - **A missing or non-positive denominator is a gap** (`value: null` with a `gap` reason),
     * never 0 and never infinite.
     * - **Currencies are never merged.** Spend in a currency with no stated rate keeps its own
     * series rather than being dropped or added to another.
     *
     * There is no `groupBy`: a per-group ratio would need a per-group denominator, and dividing
     * each service's spend by the whole customer count produces numbers that do not sum to the
     * real one.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/unit-costs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function unitCosts(string $id, UnitCostQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): UnitCostQueryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/unit-costs',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return UnitCostQueryResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a business metric
     *
     * Replaces the whole definition. Changing `key` never orphans history — values are keyed on
     * the metric's id — but it does break a workflow still writing to the old key, which is why
     * the key is separate from the display name in the first place.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/business-metrics/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A live metric already uses this key.
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, BusinessMetricInput $body, ?string $orgId = null, ?RequestOptions $options = null): BusinessMetric
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/business-metrics/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return BusinessMetric::fromArray(Coerce::toArray($data));
    }
}
