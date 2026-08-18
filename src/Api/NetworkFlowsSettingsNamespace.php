<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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
use Infrawrench\Sdk\Model\NetworkFlowSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->networkFlows->settings` */
final class NetworkFlowsSettingsNamespace extends ApiNamespace
{
    /**
     * Read the network flow collection switch
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): NetworkFlowSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return NetworkFlowSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Turn network flow collection on or off
     *
     * Collection is **off by default**. Enabling it authorizes Infrawrench to run daily queries
     * against the provider's log store — and on AWS those queries are billed to your own cloud
     * account per GB of log data scanned, every day, until you turn them off. That is why the
     * write is governed by `org:settings:write` rather than `costs:write`, and why it is
     * audit-logged.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/network-flows/settings
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(NetworkFlowSettings $body, ?string $orgId = null, ?RequestOptions $options = null): NetworkFlowSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/network-flows/settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return NetworkFlowSettings::fromArray(Coerce::toArray($data));
    }
}
