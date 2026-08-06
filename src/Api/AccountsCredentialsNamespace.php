<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->accounts->credentials` */
final class AccountsCredentialsNamespace extends ApiNamespace
{
    /**
     * Fetch the decrypted credentials for an account
     *
     * Returns the credentials map as it was originally submitted. Sensitive — gate access
     * carefully.
     *
     * _Requires permission: `secrets:read`._
     *
     * GET /api/org/{orgId}/accounts/{id}/credentials
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, string>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/{id}/credentials',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapValues($data, static fn (mixed $item): string => Coerce::toString($item));
    }

    /**
     * Rotate the credentials an account uses to talk to the upstream provider
     *
     * Replaces the encrypted credentials blob in place. Used to swap a stale or narrowly-scoped
     * token for a freshly-minted one without recreating the account (preserves existing resources,
     * pins, dashboards, sync history).
     *
     * _Requires permission: `secrets:write`._
     *
     * PUT /api/org/{orgId}/accounts/{id}/credentials
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param array{credentials: array<string, string>} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, array $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/accounts/{id}/credentials',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
