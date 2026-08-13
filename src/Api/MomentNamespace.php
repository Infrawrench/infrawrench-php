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
use Infrawrench\Sdk\Model\MomentResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->moment` */
final class MomentNamespace extends ApiNamespace
{
    /**
     * Everything that happened around a timestamp
     *
     * "What changed around 03:14?" — one merged, chronological narrative of everything the
     * platform knows happened in a window: resource changes (including sleep/wake schedule
     * attribution), provider status incidents that started/resolved in or overlap the window, cost
     * anomalies, workflow runs, deployments, audit-log entries, change freezes, and the
     * drift/expiry alert deliveries. Each feed is gated on the same permission its own endpoint
     * requires; feeds the caller cannot read are reported as `omitted`, and a feed whose query
     * fails is reported as `error` without blanking the rest of the response.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/moment
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $at Centre of the window. Defaults to now.
     * @param int|null $window Half-window in minutes (the ± around `at`). Default 60, max 4320 (±3 days).
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $at = null, ?int $window = null, ?RequestOptions $options = null): MomentResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/moment',
                pathParams: ['orgId' => $orgId],
                query: ['at' => $at, 'window' => $window],
            ),
            $options,
        );

        return MomentResponse::fromArray(Coerce::toArray($data));
    }
}
