<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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
use Infrawrench\Sdk\Model\PostureAlertSettings;
use Infrawrench\Sdk\Model\PostureAlertSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->posture->settings` */
final class PostureSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's posture alert settings
     *
     * Whether the poller's daily posture alert scan is enabled. An organization that never saved
     * reads the shipped defaults (enabled).
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/posture/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): PostureAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/posture/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PostureAlertSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the posture alert settings
     *
     * Saving never resets the alert cooldown.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/posture/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?PostureAlertSettingsUpdate $body = null, ?RequestOptions $options = null): PostureAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/posture/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return PostureAlertSettings::fromArray(Coerce::toArray($data));
    }
}
