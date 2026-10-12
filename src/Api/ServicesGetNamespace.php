<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
use Infrawrench\Sdk\Model\ServiceDetail;
use Infrawrench\Sdk\Model\ServiceList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->services->get` */
final class ServicesGetNamespace extends ApiNamespace
{
    /**
     * List services
     *
     * Every service with its owners, links, resolved member count and current scorecard levels.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/services
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ServiceList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/services',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ServiceList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read a service with its members
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/services/{serviceId}
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdServicesServiceId(string $serviceId, ?string $orgId = null, ?RequestOptions $options = null): ServiceDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/services/{serviceId}',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
            ),
            $options,
        );

        return ServiceDetail::fromArray(Coerce::toArray($data));
    }
}
