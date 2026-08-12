<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
use Infrawrench\Sdk\Model\ApiKey;
use Infrawrench\Sdk\Model\CreateApiKeyRequest;
use Infrawrench\Sdk\Model\CreatedApiKey;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->apiKeys` */
final class ApiKeysNamespace extends ApiNamespace
{
    /**
     * Create an API key (plaintext returned once)
     *
     * POST /api/org/{orgId}/api-keys
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CreateApiKeyRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CreatedApiKey
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/api-keys',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CreatedApiKey::fromArray(Coerce::toArray($data));
    }

    /**
     * List API keys (no plaintext)
     *
     * GET /api/org/{orgId}/api-keys
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ApiKey>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/api-keys',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ApiKey => ApiKey::fromArray(Coerce::toArray($item)));
    }

    /**
     * Revoke an API key
     *
     * POST /api/org/{orgId}/api-keys/{id}/revoke
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function revoke(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/api-keys/{id}/revoke',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Rotate an API key (revokes old, returns new)
     *
     * POST /api/org/{orgId}/api-keys/{id}/rotate
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rotate(string $id, ?string $orgId = null, ?RequestOptions $options = null): CreatedApiKey
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/api-keys/{id}/rotate',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CreatedApiKey::fromArray(Coerce::toArray($data));
    }
}
