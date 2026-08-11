<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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
use Infrawrench\Sdk\Model\ManagedAccount;
use Infrawrench\Sdk\Model\ManagedAccountInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->managedAccounts` */
final class ManagedAccountsNamespace extends ApiNamespace
{
    /**
     * Create a managed account
     *
     * Refused with 409 when a cost centre or account named here is already billed to another
     * customer. The error names the other customer, because “it conflicts” without saying with
     * whom sends the caller hunting.
     *
     * _Requires permission: `invoices:write`._
     *
     * POST /api/org/{orgId}/managed-accounts
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(ManagedAccountInput $body, ?string $orgId = null, ?RequestOptions $options = null): ManagedAccount
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/managed-accounts',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ManagedAccount::fromArray(Coerce::toArray($data));
    }

    /**
     * Retire a managed account
     *
     * A soft delete: an issued invoice names its customer, and an invoice whose customer stopped
     * resolving is exactly the unreconcilable document this feature exists to prevent. Draft
     * invoices are removed with it — a draft was never issued.
     *
     * _Requires permission: `invoices:write`._
     *
     * DELETE /api/org/{orgId}/managed-accounts/{id}
     *
     * Raises on 404: Not found
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
                path: '/api/org/{orgId}/managed-accounts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a managed account
     *
     * _Requires permission: `invoices:read`._
     *
     * GET /api/org/{orgId}/managed-accounts/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): ManagedAccount
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/managed-accounts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ManagedAccount::fromArray(Coerce::toArray($data));
    }

    /**
     * List managed accounts
     *
     * The customers a managed service provider bills. A managed account references existing cost
     * centres rather than defining its own matching rules, so the spend on an invoice is the same
     * spend the showback report attributes to those centres.
     *
     * _Requires permission: `invoices:read`._
     *
     * GET /api/org/{orgId}/managed-accounts
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ManagedAccount>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/managed-accounts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ManagedAccount => ManagedAccount::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a managed account
     *
     * A full replace. Editing the scope changes what **future** drafts are drawn over and nothing
     * else: every approved invoice holds its own copy of the scope, so moving a cost centre
     * between customers cannot re-bill a period that has already been invoiced.
     *
     * _Requires permission: `invoices:write`._
     *
     * PUT /api/org/{orgId}/managed-accounts/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ManagedAccountInput $body, ?string $orgId = null, ?RequestOptions $options = null): ManagedAccount
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/managed-accounts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ManagedAccount::fromArray(Coerce::toArray($data));
    }
}
