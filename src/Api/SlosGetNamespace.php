<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\SloDetail;
use Infrawrench\Sdk\Model\SloList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->slos->get` */
final class SlosGetNamespace extends ApiNamespace
{
    /**
     * List SLOs
     *
     * Every service-level objective with its last snapshot: SLI, error budget remaining (as a
     * fraction and in minutes) and burn rates over the alerting windows.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/slos
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SloList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slos',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SloList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read an SLO with its history
     *
     * The SLO plus hourly good/total buckets over its window (the SLI and budget-burndown charts
     * are drawn from these) and the change freeze in effect, if any.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/slos/{sloId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdSlosSloId(string $sloId, ?string $orgId = null, ?RequestOptions $options = null): SloDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slos/{sloId}',
                pathParams: ['orgId' => $orgId, 'sloId' => $sloId],
            ),
            $options,
        );

        return SloDetail::fromArray(Coerce::toArray($data));
    }
}
