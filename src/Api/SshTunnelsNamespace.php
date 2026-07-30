<?php

/*
 * infrawrench/sdk v0.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.17.0).
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
use Infrawrench\Sdk\Model\ActiveTunnel;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SshExecRequest;
use Infrawrench\Sdk\Model\SshExecResponse;
use Infrawrench\Sdk\Model\SshTunnelCreateAccountRequest;
use Infrawrench\Sdk\Model\SshTunnelCreateAccountResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sshTunnels` */
final class SshTunnelsNamespace extends ApiNamespace
{
    /**
     * List active tunnels for this org
     *
     * _Requires permission: `resources:execute`._
     *
     * GET /api/org/{orgId}/ssh-tunnels/active
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, ActiveTunnel>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function active(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ssh-tunnels/active',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapValues($data, static fn (mixed $item): ActiveTunnel => ActiveTunnel::fromArray(Coerce::toArray($item)));
    }

    /**
     * Close a tunnel by id
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/ssh-tunnels/close
     *
     * @param array{tunnelId: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function close(array $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-tunnels/close',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Create an account whose traffic is tunneled over SSH
     *
     * Verifies the SSH connection works before persisting.
     *
     * _Requires permission: `accounts:write`._
     *
     * POST /api/org/{orgId}/ssh-tunnels/create-account
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function createAccount(SshTunnelCreateAccountRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SshTunnelCreateAccountResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-tunnels/create-account',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SshTunnelCreateAccountResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a command over SSH using an org SSH key
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/ssh-tunnels/exec
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function exec(SshExecRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SshExecResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-tunnels/exec',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SshExecResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Re-open the tunnel for an existing account
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/ssh-tunnels/open
     *
     * Raises on 404: Not found
     *
     * @param array{accountId: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{tunnelId: string, localPort: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function open(array $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-tunnels/open',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
