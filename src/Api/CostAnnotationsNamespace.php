<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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
use Infrawrench\Sdk\Model\CostAnnotation;
use Infrawrench\Sdk\Model\CostAnnotationInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costAnnotations` */
final class CostAnnotationsNamespace extends ApiNamespace
{
    /**
     * Create a cost annotation
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-annotations
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostAnnotationInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostAnnotation
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-annotations',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAnnotation::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost annotation
     *
     * A hard delete. A withdrawn explanation should stop being drawn, and nothing references a
     * note by id.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-annotations/{id}
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
                path: '/api/org/{orgId}/cost-annotations/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List cost annotations
     *
     * Dated notes drawn over cost charts. With `reportId`, the set a chart for that report draws:
     * the org-wide notes plus that report's own. Without it, every annotation in the org.
     * Annotations are an overlay — they never appear in a series, a total, or an axis.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-annotations
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $reportId Scope to the notes a chart for this report should draw.
     * @return array{annotations: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $reportId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-annotations',
                pathParams: ['orgId' => $orgId],
                query: ['reportId' => $reportId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Update a cost annotation
     *
     * Replaces the note's dates, text and scope. Moving a note between org-wide and one report is
     * this same PUT with a different `costReportId`.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-annotations/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostAnnotationInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostAnnotation
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-annotations/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAnnotation::fromArray(Coerce::toArray($data));
    }
}
