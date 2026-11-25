<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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
use Infrawrench\Sdk\Model\CommitmentReportConfig;
use Infrawrench\Sdk\Model\CommitmentReportOptions;
use Infrawrench\Sdk\Model\CommitmentReportResult;
use Infrawrench\Sdk\Model\CommitmentsFeed;
use Infrawrench\Sdk\RequestOptions;

/** `$client->commitments` */
final class CommitmentsNamespace extends ApiNamespace
{
    /** `$client->commitments->reports` */
    public readonly CommitmentsReportsNamespace $reports;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->reports = new CommitmentsReportsNamespace($this->transport);
    }

    /**
     * Reservations, savings plans and committed-use discounts
     *
     * The organization's purchased commitments (reserved instances, savings plans, committed-use
     * discounts) with three derived readings.
     *
     * **Coverage** is a range, not a number: the broad ratio counts every uncovered usage dollar
     * in the denominator (a lower bound; egress and per-request charges can never be committed
     * against), the narrow ratio only uncovered usage in cells where a commitment demonstrably
     * landed (an upper bound). Accounts whose plugin cannot distinguish charge types are excluded
     * and listed; a scope where every account is excluded reports unavailable, not 0%.
     *
     * **Utilization** is measured only over days cost data was actually collected; a collection
     * gap is reported as missing days, never counted as idle commitment. Unit-denominated
     * commitments (GCP) report null with a reason, never 0%. Azure's own reported utilization
     * rides on each holding separately and is never blended with the derived figure.
     *
     * **The planner** recommends committing at the p10 floor of daily uncovered spend, gated on
     * presence, trend, floor and materiality. Savings are quoted against published "up to"
     * discount rates and marked as such. Nothing is ever purchased automatically.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/commitments
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CommitmentsFeed
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/commitments',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CommitmentsFeed::fromArray(Coerce::toArray($data));
    }

    /**
     * Picker values for the commitment report editor
     *
     * Providers (with whether their cost rows can measure coverage), accounts, the services and
     * regions with usage in the last 180 days, and the commitment inventory. Scoped to what the
     * caller may see.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/commitments/report-options
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reportOptions(?string $orgId = null, ?RequestOptions $options = null): CommitmentReportOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/commitments/report-options',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CommitmentReportOptions::fromArray(Coerce::toArray($data));
    }

    /**
     * Run an unsaved commitment report config
     *
     * Coverage, utilization, savings and commitment cost over time, on the amortized basis. See
     * `CommitmentReportMetricValues` for each metric's formula. A read despite the method.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/commitments/report-query
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reportQuery(CommitmentReportConfig $body, ?string $orgId = null, ?RequestOptions $options = null): CommitmentReportResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/commitments/report-query',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CommitmentReportResult::fromArray(Coerce::toArray($data));
    }
}
