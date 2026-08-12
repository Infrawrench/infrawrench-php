<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
use Infrawrench\Sdk\Model\ChangeFreeze;
use Infrawrench\Sdk\Model\ChangeFreezeInput;
use Infrawrench\Sdk\Model\ChangeFreezeStatus;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->changeFreezes` */
final class ChangeFreezesNamespace extends ApiNamespace
{
    /**
     * Declare a change freeze window
     *
     * While the freeze is in effect, destructive actions (resource deletion, destructive plugin
     * actions, secret-version destroys, deployment rollbacks) return `423` unless explicitly
     * overridden by a caller with `freezes:override`.
     *
     * _Requires permission: `freezes:write`._
     *
     * POST /api/org/{orgId}/change-freezes
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(ChangeFreezeInput $body, ?string $orgId = null, ?RequestOptions $options = null): ChangeFreeze
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/change-freezes',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ChangeFreeze::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a change freeze window
     *
     * _Requires permission: `freezes:write`._
     *
     * DELETE /api/org/{orgId}/change-freezes/{id}
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
                path: '/api/org/{orgId}/change-freezes/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * End a change freeze now
     *
     * _Requires permission: `freezes:write`._
     *
     * POST /api/org/{orgId}/change-freezes/{id}/end
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function end(string $id, ?string $orgId = null, ?RequestOptions $options = null): ChangeFreeze
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/change-freezes/{id}/end',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ChangeFreeze::fromArray(Coerce::toArray($data));
    }

    /**
     * List change freeze windows, newest first
     *
     * _Requires permission: `freezes:read`._
     *
     * GET /api/org/{orgId}/change-freezes
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ChangeFreeze>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/change-freezes',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ChangeFreeze => ChangeFreeze::fromArray(Coerce::toArray($item)));
    }

    /**
     * The freeze currently in effect, if any
     *
     * Returns the active freeze window (active, started, not yet past its end time) or `freeze:
     * null`. Clients poll this to show the freeze banner and pre-warn before destructive actions.
     *
     * _Requires permission: `freezes:read`._
     *
     * GET /api/org/{orgId}/change-freezes/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): ChangeFreezeStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/change-freezes/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ChangeFreezeStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a change freeze window
     *
     * _Requires permission: `freezes:write`._
     *
     * PUT /api/org/{orgId}/change-freezes/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ChangeFreezeInput $body, ?string $orgId = null, ?RequestOptions $options = null): ChangeFreeze
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/change-freezes/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ChangeFreeze::fromArray(Coerce::toArray($data));
    }
}
