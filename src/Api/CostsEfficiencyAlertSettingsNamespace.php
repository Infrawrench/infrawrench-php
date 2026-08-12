<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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
use Infrawrench\Sdk\Model\CostEfficiencySettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->efficiencyAlertSettings` */
final class CostsEfficiencyAlertSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's efficiency alert tuning
     *
     * Thresholds for the commitment-expiry, idle-commitment and unit-cost-regression detectors. An
     * organization that has never changed one reads back the defaults, which are chosen to work
     * with no setup.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/efficiency-alert-settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CostEfficiencySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/efficiency-alert-settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CostEfficiencySettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the organization's efficiency alert tuning
     *
     * Takes effect on the next evaluation pass (which runs after each cost collection).
     * Already-fired alerts are not re-judged, and horizons that have already fired for a
     * commitment's current term do not fire again — widening the horizon list warns about future
     * crossings, not past ones. A PUT of the whole object, not a patch.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/costs/efficiency-alert-settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(CostEfficiencySettings $body, ?string $orgId = null, ?RequestOptions $options = null): CostEfficiencySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/costs/efficiency-alert-settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostEfficiencySettings::fromArray(Coerce::toArray($data));
    }
}
