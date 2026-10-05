<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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
use Infrawrench\Sdk\Model\PriceCatalogArea;
use Infrawrench\Sdk\Model\PriceCatalogCompareResponse;
use Infrawrench\Sdk\Model\PriceCatalogSearchResponse;
use Infrawrench\Sdk\Model\PriceRateType;
use Infrawrench\Sdk\RequestOptions;

/** `$client->priceCatalog` */
final class PriceCatalogNamespace extends ApiNamespace
{
    /**
     * Compare equivalent instances across providers
     *
     * The cheapest product per provider that meets every stated spec (at least the vCPUs, memory
     * and GPUs asked for), in each provider's region for the area. Give the target as specs, or
     * name a reference product and its specs are used.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/price-catalog/compare
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $vcpus Minimum vCPUs.
     * @param string|null $memoryGb Minimum memory, GB.
     * @param string|null $gpuCount Minimum GPUs.
     * @param PriceCatalogArea::*|null $area
     * @param PriceRateType::*|null $rateType
     * @param string|null $pluginIds Comma-separated plugin ids.
     * @param string|null $alternatives Runners-up per provider, 0 to 10. Default 2.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function compare(?string $orgId = null, ?string $vcpus = null, ?string $memoryGb = null, ?string $gpuCount = null, ?string $gpuModel = null, ?string $referencePluginId = null, ?string $referenceSku = null, ?string $area = null, ?string $rateType = null, ?string $pluginIds = null, ?string $alternatives = null, ?RequestOptions $options = null): PriceCatalogCompareResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/price-catalog/compare',
                pathParams: ['orgId' => $orgId],
                query: ['vcpus' => $vcpus, 'memoryGb' => $memoryGb, 'gpuCount' => $gpuCount, 'gpuModel' => $gpuModel, 'referencePluginId' => $referencePluginId, 'referenceSku' => $referenceSku, 'area' => $area, 'rateType' => $rateType, 'pluginIds' => $pluginIds, 'alternatives' => $alternatives],
            ),
            $options,
        );

        return PriceCatalogCompareResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List the providers that publish a price catalog
     *
     * Every plugin that declares a price catalog, with its source, refresh cadence, services,
     * regions and whether its price API needs credentials. A credentialed provider the org has no
     * account on reports `no-account`.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/price-catalog/providers
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{providers: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function providers(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/price-catalog/providers',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Search provider list prices
     *
     * Search instance types across every catalog provider: one row per product priced at the
     * requested rate type in the region chosen for each provider. Filters narrow by provider,
     * service, specs, GPU and price; rows sort by monthly price by default.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/price-catalog/search
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * Raises on reauth: Recent sign-in required. Send the user through sign-in again and retry;
     * the request itself was well-formed.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $q Free text over SKU, name, series and GPU model.
     * @param string|null $pluginIds Comma-separated plugin ids.
     * @param string|null $serviceIds Comma-separated service ids (from the providers list).
     * @param string|null $families Comma-separated product families.
     * @param string|null $region Exact provider region, for providers that declare it.
     * @param PriceCatalogArea::*|null $area
     * @param string|null $minVcpus Minimum vCPUs.
     * @param string|null $maxVcpus Maximum vCPUs.
     * @param string|null $minMemoryGb Minimum memory, GB.
     * @param string|null $maxMemoryGb Maximum memory, GB.
     * @param 'any'|'required'|'none'|null $gpu
     * @param string|null $gpuModel Case-insensitive substring, e.g. `H100`.
     * @param string|null $minGpus Minimum GPU count.
     * @param string|null $maxMonthlyPrice Upper bound on the comparable monthly price.
     * @param PriceRateType::*|null $rateType
     * @param string|null $term `1yr` or `3yr` for commitments.
     * @param 'price'|'vcpus'|'memory'|'gpus'|'name'|null $sort
     * @param 'asc'|'desc'|null $order
     * @param string|null $limit Rows per page, 1 to 500. Default 100.
     * @param string|null $offset Rows to skip.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function search(?string $orgId = null, ?string $q = null, ?string $pluginIds = null, ?string $serviceIds = null, ?string $families = null, ?string $region = null, ?string $area = null, ?string $minVcpus = null, ?string $maxVcpus = null, ?string $minMemoryGb = null, ?string $maxMemoryGb = null, ?string $gpu = null, ?string $gpuModel = null, ?string $minGpus = null, ?string $maxMonthlyPrice = null, ?string $rateType = null, ?string $term = null, ?string $sort = null, ?string $order = null, ?string $limit = null, ?string $offset = null, ?RequestOptions $options = null): PriceCatalogSearchResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/price-catalog/search',
                pathParams: ['orgId' => $orgId],
                query: ['q' => $q, 'pluginIds' => $pluginIds, 'serviceIds' => $serviceIds, 'families' => $families, 'region' => $region, 'area' => $area, 'minVcpus' => $minVcpus, 'maxVcpus' => $maxVcpus, 'minMemoryGb' => $minMemoryGb, 'maxMemoryGb' => $maxMemoryGb, 'gpu' => $gpu, 'gpuModel' => $gpuModel, 'minGpus' => $minGpus, 'maxMonthlyPrice' => $maxMonthlyPrice, 'rateType' => $rateType, 'term' => $term, 'sort' => $sort, 'order' => $order, 'limit' => $limit, 'offset' => $offset],
            ),
            $options,
        );

        return PriceCatalogSearchResponse::fromArray(Coerce::toArray($data));
    }
}
