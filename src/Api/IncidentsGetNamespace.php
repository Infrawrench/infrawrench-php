<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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
use Infrawrench\Sdk\Model\IncidentDetail;
use Infrawrench\Sdk\Model\IncidentList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->incidents->get` */
final class IncidentsGetNamespace extends ApiNamespace
{
    /**
     * List declared incidents
     *
     * Every incident the organization has declared, newest first, each with the artefacts its
     * declaration created — including the ones that failed.
     *
     * _Requires permission: `incidents:read`._
     *
     * GET /api/org/{orgId}/incidents
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $status `open`, `mitigated`, `resolved`, or `all` (the default).
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $status = null, ?RequestOptions $options = null): IncidentList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/incidents',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status],
            ),
            $options,
        );

        return IncidentList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read one incident
     *
     * The incident with its artefacts and its operator notes.
     *
     * _Requires permission: `incidents:read`._
     *
     * GET /api/org/{orgId}/incidents/{incidentId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdIncidentsIncidentId(string $incidentId, ?string $orgId = null, ?RequestOptions $options = null): IncidentDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/incidents/{incidentId}',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
            ),
            $options,
        );

        return IncidentDetail::fromArray(Coerce::toArray($data));
    }
}
