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
use Infrawrench\Sdk\Model\CostReportAnomalyAlert;
use Infrawrench\Sdk\Model\CostReportAnomalyAlertInput;
use Infrawrench\Sdk\Model\CostReportAnomalyAlertTargets;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReports->anomalyAlert` */
final class CostReportsAnomalyAlertNamespace extends ApiNamespace
{
    /**
     * Delete a report's anomaly alert
     *
     * Removes the alert and its findings. The report itself is untouched.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/cost-reports/{id}/anomaly-alert
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/cost-reports/{id}/anomaly-alert',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get a report's anomaly alert
     *
     * The report's own anomaly alert and its latest findings. The detector judges the report's
     * filtered daily total (its filters and saved filter, per currency) against the trailing 28
     * days after each cost collection, re-judging the last three days as they fill in, and
     * delivers a day once (then a 7-day cooldown per currency). 404 when the report has none, or
     * when the caller cannot see the report.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}/anomaly-alert
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostReportAnomalyAlert
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports/{id}/anomaly-alert',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostReportAnomalyAlert::fromArray(Coerce::toArray($data));
    }

    /**
     * List destinations for a report anomaly alert
     *
     * The organization's connected Slack channels, Teams webhooks, live on-call rotations, members
     * and external-address policy: what the destination picker offers. Paging provider targets are
     * listed by `GET /paging-providers/destinations`.
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}/anomaly-alert/targets
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostReportAnomalyAlertTargets
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports/{id}/anomaly-alert/targets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostReportAnomalyAlertTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Create or replace a report's anomaly alert
     *
     * One alert per report, replaced whole. Destinations must belong to this organization (a live
     * Slack channel, a Teams webhook, a current member, an address the email policy allows).
     * Requires `org:settings:write`, like report delivery schedules. The alert reads spend with
     * the writer's cost visibility when they are cost-scoped.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/cost-reports/{id}/anomaly-alert
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostReportAnomalyAlertInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostReportAnomalyAlert
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-reports/{id}/anomaly-alert',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostReportAnomalyAlert::fromArray(Coerce::toArray($data));
    }
}
