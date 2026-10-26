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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\Scorecard;
use Infrawrench\Sdk\Model\ScorecardCreate;
use Infrawrench\Sdk\Model\ScorecardOverview;
use Infrawrench\Sdk\Model\ScorecardUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->scorecards` */
final class ScorecardsNamespace extends ApiNamespace
{
    /** `$client->scorecards->get` */
    public readonly ScorecardsGetNamespace $get;

    /** `$client->scorecards->org` */
    public readonly ScorecardsOrgNamespace $org;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new ScorecardsGetNamespace($this->transport);
        $this->org = new ScorecardsOrgNamespace($this->transport);
    }

    /**
     * Create a scorecard
     *
     * Omitted checks and levels default to every built-in check and bronze/silver/gold.
     * Out-of-range inputs are rejected. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/scorecards
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?ScorecardCreate $body = null, ?RequestOptions $options = null): Scorecard
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/scorecards',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Scorecard::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a scorecard
     *
     * Its results and history go with it. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/scorecards/{scorecardId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $scorecardId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/scorecards/{scorecardId}',
                pathParams: ['orgId' => $orgId, 'scorecardId' => $scorecardId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Score every service on a scorecard now
     *
     * Level drops found here are stored but not announced: the caller just changed the bar.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/scorecards/{scorecardId}/evaluate
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function evaluate(string $scorecardId, ?string $orgId = null, ?RequestOptions $options = null): ScorecardOverview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/scorecards/{scorecardId}/evaluate',
                pathParams: ['orgId' => $orgId, 'scorecardId' => $scorecardId],
            ),
            $options,
        );

        return ScorecardOverview::fromArray(Coerce::toArray($data));
    }

    /**
     * Read the scorecard matrix
     *
     * Every service, every scorecard and the current result for each applicable pair.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/scorecards/overview
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function overview(?string $orgId = null, ?RequestOptions $options = null): ScorecardOverview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/scorecards/overview',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ScorecardOverview::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a scorecard
     *
     * Omitted fields keep their value; `checks` and `levels` replace the stored lists. Services
     * are re-scored within one poller tick. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PATCH /api/org/{orgId}/scorecards/{scorecardId}
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
    public function update(string $scorecardId, ?string $orgId = null, ?ScorecardUpdate $body = null, ?RequestOptions $options = null): Scorecard
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/scorecards/{scorecardId}',
                pathParams: ['orgId' => $orgId, 'scorecardId' => $scorecardId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Scorecard::fromArray(Coerce::toArray($data));
    }
}
