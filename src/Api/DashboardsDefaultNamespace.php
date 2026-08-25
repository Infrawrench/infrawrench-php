<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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
use Infrawrench\Sdk\Model\DashboardWithPins;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->default` */
final class DashboardsDefaultNamespace extends ApiNamespace
{
    /**
     * Get-or-create the default dashboard with its pins
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/dashboards/default/full
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function full(?string $orgId = null, ?RequestOptions $options = null): DashboardWithPins
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/default/full',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DashboardWithPins::fromArray(Coerce::toArray($data));
    }
}
