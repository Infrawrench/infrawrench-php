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
use Infrawrench\Sdk\Model\VulnerabilitySettings;
use Infrawrench\Sdk\Model\VulnerabilitySettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->vulnerabilities->settings` */
final class VulnerabilitiesSettingsNamespace extends ApiNamespace
{
    /**
     * Get the vulnerability alert settings
     *
     * Defaults when never saved: alerts on, critical only, running only.
     *
     * GET /api/org/{orgId}/vulnerabilities/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): VulnerabilitySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/vulnerabilities/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return VulnerabilitySettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the vulnerability alert settings
     *
     * Saving never resets the alert cooldown.
     *
     * PUT /api/org/{orgId}/vulnerabilities/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?VulnerabilitySettingsUpdate $body = null, ?RequestOptions $options = null): VulnerabilitySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/vulnerabilities/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return VulnerabilitySettings::fromArray(Coerce::toArray($data));
    }
}
