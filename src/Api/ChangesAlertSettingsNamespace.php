<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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
use Infrawrench\Sdk\Model\DriftAlertSettings;
use Infrawrench\Sdk\Model\DriftAlertSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->changes->alertSettings` */
final class ChangesAlertSettingsNamespace extends ApiNamespace
{
    /**
     * Get the organization's resource-drift alert filter
     *
     * Drift notifications are batched: at most one message per organization per `cooldownMinutes`,
     * covering every change since the previous one. These settings decide which changes count and
     * how often a message may go out. Who receives it is the `resourceDrift` opt-in on push
     * preferences, Slack channels and Teams webhooks — off by default on all three.
     *
     * GET /api/org/{orgId}/changes/alert-settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): DriftAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/changes/alert-settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return DriftAlertSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the organization's resource-drift alert filter
     *
     * Every field is optional so a single toggle can be saved on its own. `cooldownMinutes` is
     * floored at 5: below the poller's own cycle the notification rate would follow the sync rate
     * again, which is what the batching exists to prevent.
     *
     * PUT /api/org/{orgId}/changes/alert-settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?DriftAlertSettingsUpdate $body = null, ?RequestOptions $options = null): DriftAlertSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/changes/alert-settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DriftAlertSettings::fromArray(Coerce::toArray($data));
    }
}
