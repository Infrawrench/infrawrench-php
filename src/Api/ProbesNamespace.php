<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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
use Infrawrench\Sdk\Model\ProbeMetrics;
use Infrawrench\Sdk\Model\ProbeSuggestions;
use Infrawrench\Sdk\Model\SyntheticProbe;
use Infrawrench\Sdk\Model\SyntheticProbeCreate;
use Infrawrench\Sdk\Model\SyntheticProbeList;
use Infrawrench\Sdk\Model\SyntheticProbeUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->probes` */
final class ProbesNamespace extends ApiNamespace
{
    /**
     * Create a probe
     *
     * Point an uptime/latency check at an endpoint. Numeric inputs are clamped into their allowed
     * ranges rather than rejected; the first check runs within one poller tick. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/probes
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?SyntheticProbeCreate $body = null, ?RequestOptions $options = null): SyntheticProbe
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/probes',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SyntheticProbe::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a probe
     *
     * Remove the probe. Recorded series age out of the metric store. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/probes/{probeId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $probeId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/probes/{probeId}',
                pathParams: ['orgId' => $orgId, 'probeId' => $probeId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List synthetic probes
     *
     * Every probe in the organization with its live status, consecutive-failure count, last
     * latency and trailing-24h uptime. Probes run on an interval from an edge proxy outside the
     * cluster, so results reflect what an internet client would see.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/probes
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SyntheticProbeList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/probes',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SyntheticProbeList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read a probe's recorded series
     *
     * The "Latency" (ms) and "Up" (1/0) series over a time range, from the shared metric store.
     * Resolution auto-selects raw/1-minute/1-hour rollups by span. Defaults to the trailing 24
     * hours.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/probes/{probeId}/metrics
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $startMs Range start, Unix epoch ms.
     * @param string|null $endMs Range end, Unix epoch ms.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function metrics(string $probeId, ?string $orgId = null, ?string $startMs = null, ?string $endMs = null, ?RequestOptions $options = null): ProbeMetrics
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/probes/{probeId}/metrics',
                pathParams: ['orgId' => $orgId, 'probeId' => $probeId],
                query: ['startMs' => $startMs, 'endMs' => $endMs],
            ),
            $options,
        );

        return ProbeMetrics::fromArray(Coerce::toArray($data));
    }

    /**
     * Suggest endpoints from synced resources
     *
     * Endpoint candidates mined from the organization's synced resource outputs and fields (keys
     * like url, endpoint, host, domain, publicIp). A cheap read over stored state — no provider
     * API calls. Deduplicated by URL.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/probes/suggestions
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function suggestions(?string $orgId = null, ?RequestOptions $options = null): ProbeSuggestions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/probes/suggestions',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ProbeSuggestions::fromArray(Coerce::toArray($data));
    }

    /**
     * Update or disable a probe
     *
     * Edit settings and/or toggle `enabled`. Changing the URL or method resets the probe's state
     * to `unknown` — the history belongs to the old endpoint. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/probes/{probeId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $probeId, ?string $orgId = null, ?SyntheticProbeUpdate $body = null, ?RequestOptions $options = null): SyntheticProbe
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/probes/{probeId}',
                pathParams: ['orgId' => $orgId, 'probeId' => $probeId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SyntheticProbe::fromArray(Coerce::toArray($data));
    }
}
