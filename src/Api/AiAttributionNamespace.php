<?php

/*
 * infrawrench/sdk v1.56.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.56.0).
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
use Infrawrench\Sdk\Model\AiAttributionStats;
use Infrawrench\Sdk\Model\AiSpendBreakdown;
use Infrawrench\Sdk\RequestOptions;

/** `$client->aiAttribution` */
final class AiAttributionNamespace extends ApiNamespace
{
    /** `$client->aiAttribution->dimensions` */
    public readonly AiAttributionDimensionsNamespace $dimensions;

    /** `$client->aiAttribution->sources` */
    public readonly AiAttributionSourcesNamespace $sources;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->dimensions = new AiAttributionDimensionsNamespace($this->transport);
        $this->sources = new AiAttributionSourcesNamespace($this->transport);
    }

    /**
     * Discover locations (buckets, log groups, gateways) for a source kind
     *
     * GET /api/org/{orgId}/ai-attribution/locations
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{locations: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function locations(string $accountId, string $sourceKindId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/locations',
                pathParams: ['orgId' => $orgId],
                query: ['accountId' => $accountId, 'sourceKindId' => $sourceKindId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Re-split a range of days now
     *
     * POST /api/org/{orgId}/ai-attribution/reattribute
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param array{from: string, to: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool, days: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reattribute(array $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ai-attribution/reattribute',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List the request-log source kinds the org can add
     *
     * GET /api/org/{orgId}/ai-attribution/source-kinds
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{sourceKinds: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function sourceKinds(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/source-kinds',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Attributed AI spend by one caller dimension
     *
     * Includes the `(unattributed)` remainder and `(not set)` for matched requests that lacked
     * every mapped key. For time series, group a cost report by the tag key `caller:<dimension>`.
     *
     * GET /api/org/{orgId}/ai-attribution/spend
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive start day. Defaults to 29 days ago.
     * @param string|null $to Inclusive end day. Defaults to today.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function spend(string $dimension, ?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): AiSpendBreakdown
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/spend',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'dimension' => $dimension],
            ),
            $options,
        );

        return AiSpendBreakdown::fromArray(Coerce::toArray($data));
    }

    /**
     * Match-rate statistics per source and coverage per provider
     *
     * GET /api/org/{orgId}/ai-attribution/stats
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive start day. Defaults to 29 days ago.
     * @param string|null $to Inclusive end day. Defaults to today.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function stats(?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): AiAttributionStats
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ai-attribution/stats',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to],
            ),
            $options,
        );

        return AiAttributionStats::fromArray(Coerce::toArray($data));
    }
}
