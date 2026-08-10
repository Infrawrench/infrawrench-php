<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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
use Infrawrench\Sdk\Model\GenerateSshKeyRequest;
use Infrawrench\Sdk\Model\GeneratedSshKey;
use Infrawrench\Sdk\Model\ImportSshKeyRequest;
use Infrawrench\Sdk\Model\ImportedSshKey;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SshKey;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sshKeys` */
final class SshKeysNamespace extends ApiNamespace
{
    /**
     * Generate a new Ed25519 keypair (private key returned once)
     *
     * _Requires permission: `ssh-keys:write`._
     *
     * POST /api/org/{orgId}/ssh-keys
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(GenerateSshKeyRequest $body, ?string $orgId = null, ?RequestOptions $options = null): GeneratedSshKey
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-keys',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return GeneratedSshKey::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an SSH key (owner only)
     *
     * _Requires permission: `ssh-keys:write`._
     *
     * DELETE /api/org/{orgId}/ssh-keys/{id}
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ssh-keys/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Import an existing public key
     *
     * _Requires permission: `ssh-keys:write`._
     *
     * POST /api/org/{orgId}/ssh-keys/import
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function import(ImportSshKeyRequest $body, ?string $orgId = null, ?RequestOptions $options = null): ImportedSshKey
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-keys/import',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ImportedSshKey::fromArray(Coerce::toArray($data));
    }

    /**
     * List org SSH keys
     *
     * _Requires permission: `ssh-keys:read`._
     *
     * GET /api/org/{orgId}/ssh-keys
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SshKey>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ssh-keys',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SshKey => SshKey::fromArray(Coerce::toArray($item)));
    }
}
