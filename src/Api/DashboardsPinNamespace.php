<?php

/*
 * infrawrench/sdk v0.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.4.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\PinFull;
use Infrawrench\Sdk\Model\PinRangeResponse;
use Infrawrench\Sdk\Model\PinRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->pin` */
final class DashboardsPinNamespace extends ApiNamespace
{
    /**
     * Pin a resource to a dashboard
     *
     * _Requires permission: `dashboards:write`._
     *
     * POST /api/org/{orgId}/dashboards/pin
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(PinRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/pin',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Full enriched pin data + cached probe status
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/dashboards/pin/{pinId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $pinId, ?string $orgId = null, ?RequestOptions $options = null): PinFull
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/pin/{pinId}',
                pathParams: ['orgId' => $orgId, 'pinId' => $pinId],
            ),
            $options,
        );

        return PinFull::fromArray(Coerce::toArray($data));
    }

    /**
     * Historical metric series for a pinned resource
     *
     * Returns per-series metric points between fromMs and toMs. The backend auto-routes between
     * raw, 1-minute, and 1-hour rollups based on span: ≤2h raw, ≤7d 1m, >7d 1h.
     *
     * GET /api/org/{orgId}/dashboards/pin/{pinId}/range
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function range(string $pinId, ?string $orgId = null, ?int $fromMs = null, ?int $toMs = null, ?RequestOptions $options = null): PinRangeResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/pin/{pinId}/range',
                pathParams: ['orgId' => $orgId, 'pinId' => $pinId],
                query: ['fromMs' => $fromMs, 'toMs' => $toMs],
            ),
            $options,
        );

        return PinRangeResponse::fromArray(Coerce::toArray($data));
    }
}
