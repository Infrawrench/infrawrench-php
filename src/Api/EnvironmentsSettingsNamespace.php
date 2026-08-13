<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\EnvironmentSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->environments->settings` */
final class EnvironmentsSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's environment TTL rails
     *
     * The longest TTL an instantiation may ask for and the TTL the form pre-fills. Absent settings
     * normalize into the shipped defaults (168h / 24h).
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/environments/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): EnvironmentSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/environments/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return EnvironmentSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Set the organization's environment TTL rails
     *
     * `org:settings:write`, not `resources:write` — this is a governance decision about how long
     * the organization is willing to pay for a throwaway environment. Clamped to a 720-hour
     * ceiling; the default is clamped to the maximum. Audit-logged.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/environments/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?EnvironmentSettings $body = null, ?RequestOptions $options = null): EnvironmentSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/environments/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return EnvironmentSettings::fromArray(Coerce::toArray($data));
    }
}
