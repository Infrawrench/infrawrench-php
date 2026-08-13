<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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
use Infrawrench\Sdk\Model\CostAnomalySettings;
use Infrawrench\Sdk\Model\CostAnomalySettingsView;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->anomalySettings` */
final class CostsAnomalySettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's anomaly detection thresholds
     *
     * The tunable part of cost anomaly detection. Everything else about the model — the 28-day
     * baseline, the 7-day notification cooldown, the minimum history a baseline needs — is fixed.
     * An organization that has never changed a threshold reads back the defaults. The response
     * also carries the derived, read-only `smsConfigured`.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/anomaly-settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CostAnomalySettingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/anomaly-settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CostAnomalySettingsView::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the organization's anomaly detection thresholds
     *
     * Takes effect on the next detection pass (which runs after each cost collection). Anomalies
     * already stored are not re-judged. All four fields are required — this is a PUT of the whole
     * settings object, not a patch — and `smsAlerts` deliberately has no server-side default, so a
     * client that omits it is rejected rather than silently switching an organization's SMS paging
     * back off. `smsConfigured` is derived and is not accepted here.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/costs/anomaly-settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(CostAnomalySettings $body, ?string $orgId = null, ?RequestOptions $options = null): CostAnomalySettingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/costs/anomaly-settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAnomalySettingsView::fromArray(Coerce::toArray($data));
    }
}
