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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\Account;
use Infrawrench\Sdk\Model\AccountDetail;
use Infrawrench\Sdk\Model\CreateAccountResponse;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\PluginId;
use Infrawrench\Sdk\Model\PluginSummary;
use Infrawrench\Sdk\Model\Resource;
use Infrawrench\Sdk\Model\SyncResponse;
use Infrawrench\Sdk\Model\UpdateAccountRequest;
use Infrawrench\Sdk\Model\UpdatedAccount;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accounts` */
final class AccountsNamespace extends ApiNamespace
{
    /** `$client->accounts->credentials` */
    public readonly AccountsCredentialsNamespace $credentials;

    /** `$client->accounts->syncType` */
    public readonly AccountsSyncTypeNamespace $syncType;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->credentials = new AccountsCredentialsNamespace($this->transport);
        $this->syncType = new AccountsSyncTypeNamespace($this->transport);
    }

    /**
     * Create an account
     *
     * Stores encrypted credentials and triggers a first sync. `syncError` is set if the initial
     * sync failed (the account row is still created).
     *
     * _Requires permission: `accounts:write`._
     *
     * POST /api/org/{orgId}/accounts
     *
     * Raises on 400: Bad request
     *
     * @param array{pluginId?: PluginId::*, displayName: string, credentials: array<string, string>, bastionId?: string|null} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(array $body, ?string $orgId = null, ?RequestOptions $options = null): CreateAccountResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/accounts',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return CreateAccountResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an account
     *
     * _Requires permission: `accounts:delete`._
     *
     * DELETE /api/org/{orgId}/accounts/{id}
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
                path: '/api/org/{orgId}/accounts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Account metadata + resource type list
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/accounts/{id}/detail
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function detail(string $id, ?string $orgId = null, ?RequestOptions $options = null): AccountDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/{id}/detail',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return AccountDetail::fromArray(Coerce::toArray($data));
    }

    /**
     * List accounts in this organization
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/accounts
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<Account>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): Account => Account::fromArray(Coerce::toArray($item)));
    }

    /**
     * List installed plugins and their credential fields
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/accounts/plugins
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PluginSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function plugins(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/plugins',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PluginSummary => PluginSummary::fromArray(Coerce::toArray($item)));
    }

    /**
     * List cached resources for an account
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/accounts/{id}/resources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'true'|'false'|null $topLevelOnly If `true`, only resources with no `parentResourceId` are returned.
     * @return list<Resource>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resources(string $id, ?string $orgId = null, ?string $topLevelOnly = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/{id}/resources',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['topLevelOnly' => $topLevelOnly],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): Resource => Resource::fromArray(Coerce::toArray($item)));
    }

    /**
     * Sync all resource types for an account
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/accounts/{id}/sync
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function sync(string $id, ?string $orgId = null, ?RequestOptions $options = null): SyncResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/accounts/{id}/sync',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return SyncResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Update an account (rename and/or change bastion binding)
     *
     * _Requires permission: `accounts:write`._
     *
     * PATCH /api/org/{orgId}/accounts/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, UpdateAccountRequest $body, ?string $orgId = null, ?RequestOptions $options = null): UpdatedAccount
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/accounts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return UpdatedAccount::fromArray(Coerce::toArray($data));
    }
}
