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
use Infrawrench\Sdk\Model\Scorecard;
use Infrawrench\Sdk\Model\ScorecardList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->scorecards->get` */
final class ScorecardsGetNamespace extends ApiNamespace
{
    /**
     * List scorecards
     *
     * Seeds the default scorecard for organizations that have never had one (once; a deleted
     * default is not recreated).
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/scorecards
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ScorecardList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/scorecards',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ScorecardList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read a scorecard
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/scorecards/{scorecardId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdScorecardsScorecardId(string $scorecardId, ?string $orgId = null, ?RequestOptions $options = null): Scorecard
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/scorecards/{scorecardId}',
                pathParams: ['orgId' => $orgId, 'scorecardId' => $scorecardId],
            ),
            $options,
        );

        return Scorecard::fromArray(Coerce::toArray($data));
    }
}
