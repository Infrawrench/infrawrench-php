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
use Infrawrench\Sdk\Model\SavingsView;
use Infrawrench\Sdk\Model\SavingsViewInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savingsViews` */
final class SavingsViewsNamespace extends ApiNamespace
{
    /**
     * Create a savings view
     *
     * Names are unique per organization, case-insensitively.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/savings-views
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: A live savings view already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(SavingsViewInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/savings-views',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavingsView::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a savings view
     *
     * Soft delete. Needs owner on the view (or editor when nobody owns it).
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/savings-views/{id}
     *
     * Raises on 403: Forbidden
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
                path: '/api/org/{orgId}/savings-views/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a savings view
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/savings-views/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): SavingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/savings-views/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return SavingsView::fromArray(Coerce::toArray($data));
    }

    /**
     * List savings views
     *
     * Saved views over the savings findings list: a status tab, a filter and a sort. Narrowed by
     * per-object sharing (`savings_view`); the creator owns a view.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/savings-views
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SavingsView>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/savings-views',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SavingsView => SavingsView::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a savings view
     *
     * Full replace. Needs editor on the view.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/savings-views/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A live savings view already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, SavingsViewInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/savings-views/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavingsView::fromArray(Coerce::toArray($data));
    }
}
