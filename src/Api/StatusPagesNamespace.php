<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\StatusPage;
use Infrawrench\Sdk\Model\StatusPageCreate;
use Infrawrench\Sdk\Model\StatusPageListResponse;
use Infrawrench\Sdk\Model\StatusPagePatch;
use Infrawrench\Sdk\RequestOptions;

/** `$client->statusPages` */
final class StatusPagesNamespace extends ApiNamespace
{
    /**
     * Create a status page
     *
     * Creates a page with a freshly generated slug. `published` defaults to false, so creating a
     * page never exposes anything — publish it as a separate, deliberate step.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/status-pages
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?StatusPageCreate $body = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/status-pages',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a status page
     *
     * The page's link stops working. The probes it published are untouched.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/status-pages/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/status-pages/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List status pages
     *
     * Every status page in the organization, with the probes each publishes and whether it is
     * currently reachable.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/status-pages
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): StatusPageListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/status-pages',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return StatusPageListResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Issue a new public link
     *
     * Replaces the slug, revoking the current public URL immediately — the reroll for a link that
     * ended up somewhere unintended. The page stays published.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/status-pages/{id}/rotate-slug
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rotateSlug(string $id, ?string $orgId = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/status-pages/{id}/rotate-slug',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a status page
     *
     * Omitted fields keep their value. `components`, when present, replaces the whole ordered set
     * — which is also how a reorder is expressed.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/status-pages/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?StatusPagePatch $body = null, ?RequestOptions $options = null): StatusPage
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/status-pages/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return StatusPage::fromArray(Coerce::toArray($data));
    }
}
