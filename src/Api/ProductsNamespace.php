<?php

/*
 * infrawrench/sdk v1.106.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.106.0).
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
use Infrawrench\Sdk\Model\OrgProductPolicy;
use Infrawrench\Sdk\Model\OrgProductPolicyUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->products` */
final class ProductsNamespace extends ApiNamespace
{
    /**
     * Get the apps the organization has turned off
     *
     * A turned-off app is hidden from Home, the sidebar and the Tools launcher, and its tools are
     * not offered to, and are refused for, the chat agent and the MCP server. It does not block
     * this API: the routes behind an app keep answering under their own permissions.
     *
     * GET /api/org/{orgId}/products
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OrgProductPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/products',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OrgProductPolicy::fromArray(Coerce::toArray($data));
    }

    /**
     * Set the apps the organization has turned off
     *
     * Replaces the list. An unknown app id, or an app that cannot be turned off
     * (`infrastructure`), is refused with a 400 and nothing is saved.
     *
     * _Requires permission: `org:apps:write`._
     *
     * PUT /api/org/{orgId}/products
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(OrgProductPolicyUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): OrgProductPolicy
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/products',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return OrgProductPolicy::fromArray(Coerce::toArray($data));
    }
}
