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
use Infrawrench\Sdk\Model\IdleFindingSettings;
use Infrawrench\Sdk\Model\IdleFindingSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->idleFindings->settings` */
final class IdleFindingsSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's idle-rule settings
     *
     * An organization that never saved reads the shipped defaults (enabled, 14 days).
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/idle-findings/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): IdleFindingSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/idle-findings/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return IdleFindingSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the idle-rule settings
     *
     * Every field is optional. `lookbackDays` must be a whole number from 7 to 42; an unknown rule
     * or threshold key, or a threshold outside its declared range, is rejected rather than
     * clamped. Any change makes every account due for a fresh collection.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/idle-findings/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?IdleFindingSettingsUpdate $body = null, ?RequestOptions $options = null): IdleFindingSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/idle-findings/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return IdleFindingSettings::fromArray(Coerce::toArray($data));
    }
}
