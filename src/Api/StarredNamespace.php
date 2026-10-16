<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SearchResultKind;
use Infrawrench\Sdk\RequestOptions;

/** `$client->starred` */
final class StarredNamespace extends ApiNamespace
{
    /**
     * Unstar an object
     *
     * Idempotent, and allowed on objects the caller can no longer see.
     *
     * DELETE /api/org/{orgId}/starred/{kind}/{objectId}
     *
     * Raises on 400: Bad request
     *
     * @param SearchResultKind::* $kind
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $kind, string $objectId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/starred/{kind}/{objectId}',
                pathParams: ['orgId' => $orgId, 'kind' => $kind, 'objectId' => $objectId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List the caller's starred items
     *
     * The caller's own stars in this org, most recently starred first, each resolved fresh to the
     * same shape as a search hit. Stars on objects the caller can no longer open (deleted,
     * unshared, outside their cost visibility, or of a kind their role cannot read) are left out
     * rather than deleted, so they come back if access does.
     *
     * GET /api/org/{orgId}/starred
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{items: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/starred',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Star an object
     *
     * Idempotent. The object must be one the caller could open; anything else is a 404. A member
     * can star up to 200 items per org (409 beyond that).
     *
     * PUT /api/org/{orgId}/starred/{kind}/{objectId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param SearchResultKind::* $kind
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{item: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $kind, string $objectId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/starred/{kind}/{objectId}',
                pathParams: ['orgId' => $orgId, 'kind' => $kind, 'objectId' => $objectId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
