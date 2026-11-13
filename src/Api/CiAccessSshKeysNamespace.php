<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->access->sshKeys` */
final class CiAccessSshKeysNamespace extends ApiNamespace
{
    /**
     * Stop CI jobs using someone's SSH key
     *
     * _Requires permission: `ci:write`._
     *
     * DELETE /api/org/{orgId}/ci/access/ssh-keys/{sshKeyId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $sshKeyId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ci/access/ssh-keys/{sshKeyId}',
                pathParams: ['orgId' => $orgId, 'sshKeyId' => $sshKeyId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Lend one of your SSH keys to CI jobs, or stop
     *
     * Only the key's owner can, and only for a key whose private half Infrawrench holds. Jobs name
     * it in `ssh-keys:`.
     *
     * _Requires permission: `ssh-keys:write`._
     *
     * PUT /api/org/{orgId}/ci/access/ssh-keys/{sshKeyId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param array{enabled: bool, ciName: string, repos: list<string>|null, branchPattern: string|null} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{lending: array<string, mixed>|null}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $sshKeyId, array $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ci/access/ssh-keys/{sshKeyId}',
                pathParams: ['orgId' => $orgId, 'sshKeyId' => $sshKeyId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
