<?php

/*
 * infrawrench/sdk v0.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.33.0).
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
use Infrawrench\Sdk\Model\RightsizingListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->rightsizing` */
final class RightsizingNamespace extends ApiNamespace
{
    /**
     * List oversized resources with resize recommendations
     *
     * Computes p95 CPU/memory utilisation over the last 14 days of stored metrics for every
     * resource whose plugin declares right-sizing support, and matches under-utilised ones against
     * the plugin's real size catalog (the create form's size options, live-priced). Each
     * recommendation names the cheapest smaller size that still clears a headroom margin and
     * quotes the monthly saving. Apply one by submitting `sizeFieldKey` with the recommended size
     * id through the resource-update endpoint — which enforces change freezes and writes the audit
     * trail. Results are cached for a few minutes; pass `refresh=true` to recompute.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/rightsizing
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'true'|'false'|null $refresh Bypass the short server-side cache and recompute now.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $refresh = null, ?RequestOptions $options = null): RightsizingListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/rightsizing',
                pathParams: ['orgId' => $orgId],
                query: ['refresh' => $refresh],
            ),
            $options,
        );

        return RightsizingListResponse::fromArray(Coerce::toArray($data));
    }
}
