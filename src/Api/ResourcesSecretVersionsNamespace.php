<?php

/*
 * infrawrench/sdk v0.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.12.0).
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
use Infrawrench\Sdk\Model\PluginId;
use Infrawrench\Sdk\Model\ResourceTypeId;
use Infrawrench\Sdk\Model\SecretAccessRequest;
use Infrawrench\Sdk\Model\SecretAccessResponse;
use Infrawrench\Sdk\Model\SecretAddRequest;
use Infrawrench\Sdk\Model\SecretModifyRequest;
use Infrawrench\Sdk\Model\SecretVersionResponse;
use Infrawrench\Sdk\Model\SecretVersionsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->resources->secretVersions` */
final class ResourcesSecretVersionsNamespace extends ApiNamespace
{
    /**
     * Reveal the plaintext value of a specific version (one-time)
     *
     * _Requires permission: `secrets:read`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/access
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
    public function access(string $pluginId, string $typeId, SecretAccessRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SecretAccessResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/access',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SecretAccessResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Add a new secret version
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/add
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
    public function add(string $pluginId, string $typeId, SecretAddRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SecretVersionResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/add',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SecretVersionResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List secret versions for a versioned-secret resource
     *
     * _Requires permission: `secrets:read`._
     *
     * GET /api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions
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
    public function get(string $pluginId, string $typeId, string $resourceId, string $accountId, ?string $orgId = null, ?string $parentResourceId = null, ?RequestOptions $options = null): SecretVersionsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                query: ['resourceId' => $resourceId, 'accountId' => $accountId, 'parentResourceId' => $parentResourceId],
            ),
            $options,
        );

        return SecretVersionsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Enable/disable/destroy a secret version
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/modify
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
    public function modify(string $pluginId, string $typeId, SecretModifyRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SecretVersionResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/{pluginId}/{typeId}/secret-versions/modify',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId, 'typeId' => $typeId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SecretVersionResponse::fromArray(Coerce::toArray($data));
    }
}
