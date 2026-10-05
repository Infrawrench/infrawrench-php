<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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
use Infrawrench\Sdk\Model\VirtualTag;
use Infrawrench\Sdk\Model\VirtualTagInput;
use Infrawrench\Sdk\Model\VirtualTagStats;
use Infrawrench\Sdk\RequestOptions;

/** `$client->virtualTags` */
final class VirtualTagsNamespace extends ApiNamespace
{
    /**
     * Create a virtual tag
     *
     * Queues the background evaluation over stored history at once.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/virtual-tags
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(VirtualTagInput $body, ?string $orgId = null, ?RequestOptions $options = null): VirtualTag
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/virtual-tags',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return VirtualTag::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a virtual tag
     *
     * Refused with a 409 that names every saved filter, budget, report, dashboard card, change
     * alert, allocation rule, cost export or business metric still referencing the key: deleting
     * it would make those fail rather than quietly widen to all spend.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/virtual-tags/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
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
                path: '/api/org/{orgId}/virtual-tags/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a virtual tag
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/virtual-tags/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): VirtualTag
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/virtual-tags/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return VirtualTag::fromArray(Coerce::toArray($data));
    }

    /**
     * List virtual tags
     *
     * Virtual tags are tags the organisation computes from its own ordered rules: merge
     * `env`/`Environment`/`ENV` into one key, assign values by any cost filter, split shared spend
     * by percentage or by a business metric, with optional start and end dates per rule. They work
     * as the `virtual_tag` cost dimension everywhere a tag does.
     *
     * **They are computed at query time and never written into stored cost data**, and splits are
     * weighted so a total never changes.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/virtual-tags
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<VirtualTag>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/virtual-tags',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): VirtualTag => VirtualTag::fromArray(Coerce::toArray($item)));
    }

    /**
     * Preview an unsaved virtual tag
     *
     * Evaluates a definition over the trailing 30 days without storing it: spend per rule,
     * unmatched spend and the top values. Validates exactly as a save would.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/virtual-tags/preview
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(VirtualTagInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?VirtualTagStats
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/virtual-tags/preview',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): VirtualTagStats => VirtualTagStats::fromArray(Coerce::toArray($value)));
    }

    /**
     * Re-run a virtual tag's evaluation
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/virtual-tags/{id}/reprocess
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reprocess(string $id, ?string $orgId = null, ?RequestOptions $options = null): VirtualTag
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/virtual-tags/{id}/reprocess',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return VirtualTag::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a virtual tag
     *
     * A full replace, rule order included. The key cannot change (400). Saving re-queues the
     * background evaluation.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/virtual-tags/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, VirtualTagInput $body, ?string $orgId = null, ?RequestOptions $options = null): VirtualTag
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/virtual-tags/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return VirtualTag::fromArray(Coerce::toArray($data));
    }
}
