<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\PrCheckRepository;
use Infrawrench\Sdk\Model\PrCheckRepositoryInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->prChecks->repositories` */
final class PrChecksRepositoriesNamespace extends ApiNamespace
{
    /**
     * Turn on pull request checks for a repository
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/pr-checks/repositories
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(PrCheckRepositoryInput $body, ?string $orgId = null, ?RequestOptions $options = null): PrCheckRepository
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/pr-checks/repositories',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return PrCheckRepository::fromArray(Coerce::toArray($data));
    }

    /**
     * Stop pull request checks for a repository
     *
     * Removes the settings and the repository's check history.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/pr-checks/repositories/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/pr-checks/repositories/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get one repository's pull request check settings
     *
     * _Requires permission: `iac:read`._
     *
     * GET /api/org/{orgId}/pr-checks/repositories/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): PrCheckRepository
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/pr-checks/repositories/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return PrCheckRepository::fromArray(Coerce::toArray($data));
    }

    /**
     * List repositories with pull request checks
     *
     * _Requires permission: `iac:read`._
     *
     * GET /api/org/{orgId}/pr-checks/repositories
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PrCheckRepository>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/pr-checks/repositories',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PrCheckRepository => PrCheckRepository::fromArray(Coerce::toArray($item)));
    }

    /**
     * Replace one repository's pull request check settings
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/pr-checks/repositories/{id}
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
    public function update(string $id, PrCheckRepositoryInput $body, ?string $orgId = null, ?RequestOptions $options = null): PrCheckRepository
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/pr-checks/repositories/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return PrCheckRepository::fromArray(Coerce::toArray($data));
    }
}
