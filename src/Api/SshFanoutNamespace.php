<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\SshFanoutRunRequest;
use Infrawrench\Sdk\Model\SshFanoutRunResponse;
use Infrawrench\Sdk\Model\SshFanoutTargetsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sshFanout` */
final class SshFanoutNamespace extends ApiNamespace
{
    /** `$client->sshFanout->snippets` */
    public readonly SshFanoutSnippetsNamespace $snippets;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->snippets = new SshFanoutSnippetsNamespace($this->transport);
    }

    /**
     * Run one command across many SSH hosts
     *
     * Executes the command on every selected target under a concurrency cap (default 8, max 16).
     * Per-host results carry stdout, stderr, and exit code; transport failures (unreachable,
     * untrusted host key, blocked internal host) are per-host too. Resource targets need
     * `sshKeyId` (an org SSH key owned by the caller). Blocked with HTTP 423 while a change freeze
     * is in effect; audit-logged.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/ssh-fanout/run
     *
     * Raises on 400: Bad request
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(SshFanoutRunRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SshFanoutRunResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ssh-fanout/run',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SshFanoutRunResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List SSH-capable fan-out targets
     *
     * Every SSH-capable target in the org: `ssh` plugin accounts (native credentials) plus
     * resources whose type declares an sshEndpoint with a resolvable host (EC2 instances,
     * droplets, Hetzner servers, …).
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/ssh-fanout/targets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(?string $orgId = null, ?RequestOptions $options = null): SshFanoutTargetsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ssh-fanout/targets',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SshFanoutTargetsResponse::fromArray(Coerce::toArray($data));
    }
}
