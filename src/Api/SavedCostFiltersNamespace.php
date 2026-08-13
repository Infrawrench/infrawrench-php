<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\SavedCostFilter;
use Infrawrench\Sdk\Model\SavedCostFilterInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savedCostFilters` */
final class SavedCostFiltersNamespace extends ApiNamespace
{
    /**
     * Create a saved cost filter
     *
     * Names must be unique per organization (case-insensitively) — they are how the CLI's
     * `--filter <name>` and humans address the filter. A name collision is a 409.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/saved-cost-filters
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: A live saved filter already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(SavedCostFilterInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavedCostFilter
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/saved-cost-filters',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavedCostFilter::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a saved cost filter
     *
     * Soft delete — **refused with a 409 while anything references the filter**, with the
     * referents in the body. Deleting a referenced filter would silently widen every referent's
     * scope to all spend; for a budget that can fire or suppress alerts, so detaching the
     * referents is a deliberate step, never a side effect of deletion.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/saved-cost-filters/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Still referenced — the body lists every referent.
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
                path: '/api/org/{orgId}/saved-cost-filters/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a saved cost filter
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/saved-cost-filters/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): SavedCostFilter
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/saved-cost-filters/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return SavedCostFilter::fromArray(Coerce::toArray($data));
    }

    /**
     * List saved cost filters
     *
     * Named, reusable cost filter sets. Graphs, reports and budgets reference one **by id**
     * (`savedFilterId` in their configs and in `POST /costs/query`), and the server resolves the
     * reference at query time — so editing a saved filter changes every referent at once, and
     * nothing ever holds a copy.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/saved-cost-filters
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SavedCostFilter>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/saved-cost-filters',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SavedCostFilter => SavedCostFilter::fromArray(Coerce::toArray($item)));
    }

    /**
     * List a saved filter's referents
     *
     * Every budget, cost report and dashboard cost graph referencing this filter — what an edit
     * will re-scope, and what a delete would be refused over.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/saved-cost-filters/{id}/referents
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{referents: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function referents(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/saved-cost-filters/{id}/referents',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Update a saved cost filter
     *
     * Replaces the filter's name, description and terms. This is the high-leverage write: every
     * graph, report and budget referencing the filter runs the new terms on its next query —
     * re-scoping a referenced budget can change which alerts fire. `GET /{id}/referents` names
     * what a change will touch.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/saved-cost-filters/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A live saved filter already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, SavedCostFilterInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavedCostFilter
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/saved-cost-filters/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavedCostFilter::fromArray(Coerce::toArray($data));
    }
}
