<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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
use Infrawrench\Sdk\Model\QuotaAlertSettings;
use Infrawrench\Sdk\Model\QuotaAlertSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->quotas->settings` */
final class QuotasSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's quota alert settings
     *
     * The threshold feeds both the feed's severity buckets and the poller's daily alert scan. An
     * organization that never saved reads the shipped defaults (enabled, 0.8).
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/quotas/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): QuotaAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/quotas/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return QuotaAlertSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the quota alert settings
     *
     * Every field is optional so a single toggle can be saved on its own. `threshold` is a
     * fraction from 0.5 to 0.99 and is rejected rather than clamped when out of range. Saving
     * never resets the alert cooldown.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/quotas/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?QuotaAlertSettingsUpdate $body = null, ?RequestOptions $options = null): QuotaAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/quotas/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return QuotaAlertSettings::fromArray(Coerce::toArray($data));
    }
}
