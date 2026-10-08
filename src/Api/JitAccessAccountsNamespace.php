<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
use Infrawrench\Sdk\Model\JitAccessAccount;
use Infrawrench\Sdk\Model\JitPickerOption;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jitAccess->accounts` */
final class JitAccessAccountsNamespace extends ApiNamespace
{
    /**
     * Accounts that can grant just-in-time access
     *
     * Connected accounts whose provider plugin declares the just-in-time capability.
     *
     * _Requires permission: `access:read`._
     *
     * GET /api/org/{orgId}/jit-access/accounts
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JitAccessAccount>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/accounts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JitAccessAccount => JitAccessAccount::fromArray(Coerce::toArray($item)));
    }

    /**
     * Grantable roles in a scope (picker)
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/jit-access/accounts/{accountId}/roles
     *
     * Raises on 502: Provider error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JitPickerOption>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function roles(string $accountId, string $scopeId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/accounts/{accountId}/roles',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                query: ['scopeId' => $scopeId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JitPickerOption => JitPickerOption::fromArray(Coerce::toArray($item)));
    }

    /**
     * Scopes on an account (picker)
     *
     * The places a role can be granted (AWS accounts, GCP projects, namespaces), read from the
     * provider.
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/jit-access/accounts/{accountId}/scopes
     *
     * Raises on 502: Provider error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JitPickerOption>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function scopes(string $accountId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jit-access/accounts/{accountId}/scopes',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JitPickerOption => JitPickerOption::fromArray(Coerce::toArray($item)));
    }
}
