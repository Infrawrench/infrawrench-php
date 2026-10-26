<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\OrgScorecard;
use Infrawrench\Sdk\Model\OrgScorecardHistory;
use Infrawrench\Sdk\RequestOptions;

/** `$client->scorecards->org` */
final class ScorecardsOrgNamespace extends ApiNamespace
{
    /**
     * Grade the organization
     *
     * The org grade shown above the scorecard matrix: one weighted reading over seven feeds the
     * product already computes (security posture, backup coverage, the service scorecard results,
     * declared deadlines, the cross-cloud access review, quota headroom and resource ownership).
     * Nothing is re-derived.
     *
     * An unassessed pillar is excluded, never scored zero, and weights renormalize over what was
     * assessed. The trend comes from a daily snapshot the poller records; days when nothing could
     * be graded are absent rather than zero. Does not seed the default scorecard.
     *
     * GET /api/org/{orgId}/scorecards/org
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OrgScorecard
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/scorecards/org',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OrgScorecard::fromArray(Coerce::toArray($data));
    }

    /**
     * List stored org grade readings
     *
     * The daily history alone, without computing the grade: the cheap read for a sparkline.
     *
     * GET /api/org/{orgId}/scorecards/org/history
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $days How far back to read. Defaults to 90; readings are kept for 400 days.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function history(?string $orgId = null, ?int $days = null, ?RequestOptions $options = null): OrgScorecardHistory
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/scorecards/org/history',
                pathParams: ['orgId' => $orgId],
                query: ['days' => $days],
            ),
            $options,
        );

        return OrgScorecardHistory::fromArray(Coerce::toArray($data));
    }
}
