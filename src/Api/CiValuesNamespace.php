<?php

/*
 * infrawrench/sdk v1.106.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.106.0).
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
use Infrawrench\Sdk\Model\CiValues;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->values` */
final class CiValuesNamespace extends ApiNamespace
{
    /**
     * Remove a CI secret or variable
     *
     * _Requires permission: `ci:write`._
     *
     * DELETE /api/org/{orgId}/ci/values/{kind}/{name}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param 'secrets'|'variables' $kind
     * @param int $installationId The GitHub App installation of an account that runs CI.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $repo A repository's name, for its own values. Omitted: the whole account's.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $kind, string $name, int $installationId, ?string $orgId = null, ?string $repo = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/ci/values/{kind}/{name}',
                pathParams: ['orgId' => $orgId, 'kind' => $kind, 'name' => $name],
                query: ['installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List an account's or a repository's CI secrets and variables
     *
     * A repository's own value overrides the account's of the same name. Pipelines read them as
     * `${{ secrets.NAME }}` and `${{ vars.NAME }}`; a fork's pull request gets variables but never
     * secrets.
     *
     * _Requires permission: `ci:write`._
     *
     * GET /api/org/{orgId}/ci/values
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param int $installationId The GitHub App installation of an account that runs CI.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $repo A repository's name, for its own values. Omitted: the whole account's.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(int $installationId, ?string $orgId = null, ?string $repo = null, ?RequestOptions $options = null): CiValues
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/values',
                pathParams: ['orgId' => $orgId],
                query: ['installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return CiValues::fromArray(Coerce::toArray($data));
    }

    /**
     * Set a CI secret or variable
     *
     * _Requires permission: `ci:write`._
     *
     * PUT /api/org/{orgId}/ci/values/{kind}/{name}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param 'secrets'|'variables' $kind
     * @param int $installationId The GitHub App installation of an account that runs CI.
     * @param array{value: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $repo A repository's name, for its own values. Omitted: the whole account's.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $kind, string $name, int $installationId, array $body, ?string $orgId = null, ?string $repo = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/ci/values/{kind}/{name}',
                pathParams: ['orgId' => $orgId, 'kind' => $kind, 'name' => $name],
                query: ['installationId' => $installationId, 'repo' => $repo],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
