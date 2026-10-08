<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
use Infrawrench\Sdk\Model\KubernetesNetworkSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->networkFlows->kubernetes->settings` */
final class NetworkFlowsKubernetesSettingsNamespace extends ApiNamespace
{
    /**
     * Read a cluster's network cost settings
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/network-flows/kubernetes/{accountId}/settings
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $accountId, ?string $orgId = null, ?RequestOptions $options = null): KubernetesNetworkSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/network-flows/kubernetes/{accountId}/settings',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
            ),
            $options,
        );

        return KubernetesNetworkSettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Set the billed data-transfer source for a cluster
     *
     * Say which billed cost rows are this cluster's data transfer, in the cost query language. An
     * empty or null query clears it. A query that narrows nothing is refused: it would apportion
     * the whole bill across one cluster.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/network-flows/kubernetes/{accountId}/settings
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param array{billedQuery: string|null} $body
     * @param string|null $orgId Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $accountId, array $body, ?string $orgId = null, ?RequestOptions $options = null): KubernetesNetworkSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/network-flows/kubernetes/{accountId}/settings',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return KubernetesNetworkSettings::fromArray(Coerce::toArray($data));
    }
}
