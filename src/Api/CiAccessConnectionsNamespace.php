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
use Infrawrench\Sdk\Model\CiConnectionAccess;
use Infrawrench\Sdk\Model\CiConnectionAccessSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->access->connections` */
final class CiAccessConnectionsNamespace extends ApiNamespace
{
    /**
     * Check whether a connection can run cloud jobs of a kind
     *
     * Asks the provider without starting anything (a dry run or a permission test) and keeps the
     * answer: what is missing and how to grant it. A failing check turns that kind off.
     *
     * _Requires permission: `ci-access:write`._
     *
     * POST /api/org/{orgId}/ci/access/connections/{accountId}/preflight
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param array{kind: 'vm'|'container'|'build'|'host'|'cluster', region?: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preflight(string $accountId, array $body, ?string $orgId = null, ?RequestOptions $options = null): CiConnectionAccess
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/access/connections/{accountId}/preflight',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return CiConnectionAccess::fromArray(Coerce::toArray($data));
    }

    /**
     * Set what CI may do with a connection
     *
     * Run cloud jobs on it (kinds, limits, repositories, branches) and lend its credentials to
     * jobs (repositories, branches). Turning cloud jobs on needs a passing permission check for
     * every kind.
     *
     * _Requires permission: `ci-access:write`._
     *
     * PUT /api/org/{orgId}/ci/access/connections/{accountId}
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
    public function update(string $accountId, CiConnectionAccessSettings $body, ?string $orgId = null, ?RequestOptions $options = null): CiConnectionAccess
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ci/access/connections/{accountId}',
                pathParams: ['orgId' => $orgId, 'accountId' => $accountId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CiConnectionAccess::fromArray(Coerce::toArray($data));
    }
}
