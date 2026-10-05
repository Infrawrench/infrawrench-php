<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
use Infrawrench\Sdk\Model\CustomCostDeleted;
use Infrawrench\Sdk\Model\CustomCostUpload;
use Infrawrench\Sdk\Model\CustomCostUploadCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->customCostSources->uploads` */
final class CustomCostSourcesUploadsNamespace extends ApiNamespace
{
    /**
     * Finish an upload
     *
     * Applies `replace` (zeroing this source's rows from other uploads in the range) and records
     * what the upload holds.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}/complete
     *
     * Raises on 400: Already complete
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function complete(string $id, string $uploadId, ?string $orgId = null, ?RequestOptions $options = null): CustomCostUpload
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}/complete',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'uploadId' => $uploadId],
            ),
            $options,
        );

        return CustomCostUpload::fromArray(Coerce::toArray($data));
    }

    /**
     * Start an upload
     *
     * Declares the upload's date range and what happens to spend already held in it. Then send
     * rows with `…/rows` (up to 5,000 per call) and finish with `…/complete`.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/custom-cost-sources/{id}/uploads
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The range overlaps earlier uploads and no `mode` was given
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, CustomCostUploadCreate $body, ?string $orgId = null, ?RequestOptions $options = null): CustomCostUpload
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-cost-sources/{id}/uploads',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomCostUpload::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an upload and the rows it wrote
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, string $uploadId, ?string $orgId = null, ?RequestOptions $options = null): CustomCostDeleted
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'uploadId' => $uploadId],
            ),
            $options,
        );

        return CustomCostDeleted::fromArray(Coerce::toArray($data));
    }

    /**
     * List a source's uploads
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/custom-cost-sources/{id}/uploads
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CustomCostUpload>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-cost-sources/{id}/uploads',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CustomCostUpload => CustomCostUpload::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send a chunk of rows to an open upload
     *
     * The chunk is validated whole: a 400 means none of it was written.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}/rows
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param array{rows: list<array<string, mixed>>} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{written: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rows(string $id, string $uploadId, array $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-cost-sources/{id}/uploads/{uploadId}/rows',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'uploadId' => $uploadId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
