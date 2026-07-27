<?php

/*
 * infrawrench/sdk v0.8.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.8.0).
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
use Infrawrench\Sdk\Model\CostDimensionValues;
use Infrawrench\Sdk\Model\CostPushRequest;
use Infrawrench\Sdk\Model\CostPushResponse;
use Infrawrench\Sdk\Model\CostQueryRequest;
use Infrawrench\Sdk\Model\CostQueryResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs` */
final class CostsNamespace extends ApiNamespace
{
    /**
     * List distinct values for a cost dimension
     *
     * Feeds the filter and group-by pickers. Pass dimension=tag-keys for tag keys; dimension=tag
     * requires tagKey.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/dimensions
     *
     * Raises on 400: Bad request
     *
     * @param 'provider'|'account'|'service'|'region'|'resource'|'tag'|'tag-keys' $dimension
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function dimensions(string $dimension, ?string $orgId = null, ?string $tagKey = null, ?RequestOptions $options = null): CostDimensionValues
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/dimensions',
                pathParams: ['orgId' => $orgId],
                query: ['dimension' => $dimension, 'tagKey' => $tagKey],
            ),
            $options,
        );

        return CostDimensionValues::fromArray(Coerce::toArray($data));
    }

    /**
     * Query aggregated cost series
     *
     * Aggregates collected provider spend into per-bucket, per-group series for cost graphs.
     * Currencies are never merged; mixed-currency orgs get one series per currency. Optionally
     * returns a previous-period comparison and a trend forecast.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/costs/query
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(CostQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CostQueryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/query',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostQueryResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Push cost rows from your own systems
     *
     * Reports spend Infrawrench has no provider plugin for — a parsed SaaS invoice, an internal
     * chargeback, a colo bill — into the same store the provider collectors write to, so it
     * appears in cost graphs, dimension filters, and budgets alongside everything else.
     *
     * Rows are grouped under a caller-chosen `source`. Writes are idempotent per `(source, day,
     * service, region, resourceId, tags, currency)`: pushing the same day again restates that day
     * rather than adding to it, so a nightly job can safely re-push a trailing window. Rows pushed
     * under a source can never overwrite rows a provider collector wrote.
     *
     * The whole batch is validated before anything is stored, so a 400 means nothing was written.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/costs/rows
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rows(CostPushRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CostPushResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/rows',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostPushResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Per-account cost collection status
     *
     * Which accounts support cost collection, whether their history backfill has completed, and
     * the ingested date coverage.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{accounts: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
