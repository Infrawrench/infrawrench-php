<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\SessionRecordingSettings;
use Infrawrench\Sdk\Model\SessionRecordingSettingsUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sessionRecordings->settings` */
final class SessionRecordingsSettingsNamespace extends ApiNamespace
{
    /**
     * Get the recording policy
     *
     * The organization's recording policy plus what it currently stores. Usage rides along with
     * the policy because the only question anyone asks about retention is what it costs.
     *
     * _Requires permission: `session-recordings:read`._
     *
     * GET /api/org/{orgId}/session-recordings/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SessionRecordingSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/session-recordings/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SessionRecordingSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the recording policy
     *
     * Partial update — omitted fields keep their current value. Recording is opt-in and off by
     * default. Audit-logged with the before/after policy.
     *
     * _Requires permission: `session-recordings:write`._
     *
     * PUT /api/org/{orgId}/session-recordings/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?SessionRecordingSettingsUpdate $body = null, ?RequestOptions $options = null): SessionRecordingSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/session-recordings/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SessionRecordingSettings::fromArray(Coerce::toArray($data));
    }
}
