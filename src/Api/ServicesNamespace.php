<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\Service;
use Infrawrench\Sdk\Model\ServiceCreate;
use Infrawrench\Sdk\Model\ServiceScorecards;
use Infrawrench\Sdk\Model\ServiceSummary;
use Infrawrench\Sdk\Model\ServiceUpdate;
use Infrawrench\Sdk\Model\ServicesForResources;
use Infrawrench\Sdk\RequestOptions;

/** `$client->services` */
final class ServicesNamespace extends ApiNamespace
{
    /** `$client->services->get` */
    public readonly ServicesGetNamespace $get;

    /** `$client->services->members` */
    public readonly ServicesMembersNamespace $members;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new ServicesGetNamespace($this->transport);
        $this->members = new ServicesMembersNamespace($this->transport);
    }

    /**
     * Create a service
     *
     * Owners, the on-call schedule, SLOs and runbooks must belong to the organization.
     * Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/services
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?ServiceCreate $body = null, ?RequestOptions $options = null): Service
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/services',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Service::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a service
     *
     * The member resources, SLOs, runbooks and schedule are untouched. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/services/{serviceId}
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $serviceId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/services/{serviceId}',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Look up the services resources belong to
     *
     * Membership is explicit members plus rules minus exclusions, resolved against the current
     * inventory. Resources in no service are absent from the map.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/services/for-resources
     *
     * Raises on 400: Bad request
     *
     * @param string $ids Comma-separated Infrawrench resource ids (at most 500).
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function forResources(string $ids, ?string $orgId = null, ?RequestOptions $options = null): ServicesForResources
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/services/for-resources',
                pathParams: ['orgId' => $orgId],
                query: ['ids' => $ids],
            ),
            $options,
        );

        return ServicesForResources::fromArray(Coerce::toArray($data));
    }

    /**
     * Read a service's scorecard results and history
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/services/{serviceId}/scorecards
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function scorecards(string $serviceId, ?string $orgId = null, ?RequestOptions $options = null): ServiceScorecards
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/services/{serviceId}/scorecards',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
            ),
            $options,
        );

        return ServiceScorecards::fromArray(Coerce::toArray($data));
    }

    /**
     * Summarize a service
     *
     * Trailing 30-day member spend (scoped to the caller's cost visibility), linked SLO standing,
     * open posture, orphan and backup findings on members, the current on-call shift, the last
     * week's changes and current scorecard results. Feeds that fail are listed in
     * `findings.unavailable` or `cost.available` rather than failing the request.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/services/{serviceId}/summary
     *
     * Raises on 404: Not found
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function summary(string $serviceId, ?string $orgId = null, ?RequestOptions $options = null): ServiceSummary
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/services/{serviceId}/summary',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
            ),
            $options,
        );

        return ServiceSummary::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a service
     *
     * Omitted fields keep their value. List fields (owners, links, SLOs, runbooks, rules) replace
     * the stored list. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PATCH /api/org/{orgId}/services/{serviceId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string $serviceId Service id or slug.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $serviceId, ?string $orgId = null, ?ServiceUpdate $body = null, ?RequestOptions $options = null): Service
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/services/{serviceId}',
                pathParams: ['orgId' => $orgId, 'serviceId' => $serviceId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Service::fromArray(Coerce::toArray($data));
    }
}
