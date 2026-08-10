<?php

/*
 * infrawrench/sdk v1.7.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.7.0).
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
use Infrawrench\Sdk\Model\ExpiryAlertSettings;
use Infrawrench\Sdk\Model\ExpiryAlertSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->expiring->settings` */
final class ExpiringSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's expiry alert settings
     *
     * The lead time feeds both the feed's `upcoming` bucket and the poller's daily alert scan. An
     * organization that never saved reads the shipped defaults (enabled, 60 days).
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/expiring/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ExpiryAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/expiring/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ExpiryAlertSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the expiry alert settings
     *
     * Every field is optional so a single toggle can be saved on its own. `leadDays` must be a
     * whole number from 1 to 365. Saving never resets the alert cooldown.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/expiring/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?ExpiryAlertSettingsUpdate $body = null, ?RequestOptions $options = null): ExpiryAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/expiring/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ExpiryAlertSettings::fromArray(Coerce::toArray($data));
    }
}
