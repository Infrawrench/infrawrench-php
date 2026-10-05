<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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
use Infrawrench\Sdk\Model\RealizedSavingsSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savings->settings` */
final class SavingsSettingsNamespace extends ApiNamespace
{
    /**
     * Get realized savings settings
     *
     * The org's horizon, shortfall threshold and baseline window; defaults when never saved.
     *
     * GET /api/org/{orgId}/savings/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): RealizedSavingsSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/savings/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return RealizedSavingsSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update realized savings settings
     *
     * Requires `costs:write`. Changes every figure in the report, retroactively.
     *
     * PUT /api/org/{orgId}/savings/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(RealizedSavingsSettings $body, ?string $orgId = null, ?RequestOptions $options = null): RealizedSavingsSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/savings/settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return RealizedSavingsSettings::fromArray(Coerce::toArray($data));
    }
}
