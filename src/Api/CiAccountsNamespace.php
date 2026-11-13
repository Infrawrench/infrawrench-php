<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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
use Infrawrench\Sdk\Model\CiAccount;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->accounts` */
final class CiAccountsNamespace extends ApiNamespace
{
    /**
     * Run CI, or stop running it, for a connected GitHub account
     *
     * _Requires permission: `ci:write`._
     *
     * PUT /api/org/{orgId}/ci/accounts/{installationId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param array{enabled: bool} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $installationId, array $body, ?string $orgId = null, ?RequestOptions $options = null): CiAccount
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ci/accounts/{installationId}',
                pathParams: ['orgId' => $orgId, 'installationId' => $installationId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return CiAccount::fromArray(Coerce::toArray($data));
    }
}
