<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
use Infrawrench\Sdk\Model\ApplyManifestRequest;
use Infrawrench\Sdk\Model\Manifest;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\PluginId;
use Infrawrench\Sdk\Model\ResourceTypeId;
use Infrawrench\Sdk\RequestOptions;

/** `$client->resources->manifest` */
final class ResourcesManifestNamespace extends ApiNamespace
{
    /**
     * Apply an edited manifest to a resource
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/manifest
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $pluginId, string $typeId, ApplyManifestRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/manifest',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Fetch the raw manifest (YAML/JSON) for a resource
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resources/{pluginId}/{typeId}/manifest
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param ResourceTypeId::* $typeId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $pluginId, string $typeId, string $resourceId, string $accountId, ?string $orgId = null, ?string $parentResourceId = null, ?RequestOptions $options = null): Manifest
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/manifest',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                query: ['resourceId' => $resourceId, 'accountId' => $accountId, 'parentResourceId' => $parentResourceId],
            ),
            $options,
        );

        return Manifest::fromArray(Coerce::toArray($data));
    }
}
