<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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
use Infrawrench\Sdk\Model\SshInstallAccount;
use Infrawrench\Sdk\Model\SshInstallRequest;
use Infrawrench\Sdk\Model\SshInstallResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->resources->sshInstall` */
final class ResourcesSshInstallNamespace extends ApiNamespace
{
    /**
     * List service accounts that can enroll an SSH server
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resources/ssh-install/accounts
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SshInstallAccount>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function accounts(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resources/ssh-install/accounts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SshInstallAccount => SshInstallAccount::fromArray(Coerce::toArray($item)));
    }

    /**
     * Install and enroll a service on an existing SSH target
     *
     * Requires resources:write and resources:execute. Uses the selected target's saved SSH
     * connection or an org SSH key. Respects change freezes and host-key trust. Enrollment
     * credentials never appear in the response or audit log.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/resources/ssh-install
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 409: SSH host-key trust is required before installation can begin
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(SshInstallRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SshInstallResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resources/ssh-install',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SshInstallResult::fromArray(Coerce::toArray($data));
    }
}
