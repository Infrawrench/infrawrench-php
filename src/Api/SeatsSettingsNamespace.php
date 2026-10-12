<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
use Infrawrench\Sdk\Model\SeatSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->seats->settings` */
final class SeatsSettingsNamespace extends ApiNamespace
{
    /**
     * Get the seat settings
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/seats/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SeatSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/seats/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SeatSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the seat settings
     *
     * `inactiveDays` must be a whole number from 7 to 365; it is rejected, not clamped.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/seats/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?SeatSettings $body = null, ?RequestOptions $options = null): SeatSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/seats/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SeatSettings::fromArray(Coerce::toArray($data));
    }
}
