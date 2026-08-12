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
use Infrawrench\Sdk\Model\CostExport;
use Infrawrench\Sdk\Model\CostExportInput;
use Infrawrench\Sdk\Model\CostExportRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costExports` */
final class CostExportsNamespace extends ApiNamespace
{
    /**
     * Create a cost export
     *
     * Credentials are required on create. They are encrypted at rest and no route ever returns
     * them; responses carry a redacted `credentialHint` instead.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-exports
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostExportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostExport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-exports',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostExport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost export
     *
     * Soft delete. Objects already written to the destination are left alone.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/cost-exports/{id}
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
                path: '/api/org/{orgId}/cost-exports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a cost export
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-exports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostExport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-exports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostExport::fromArray(Coerce::toArray($data));
    }

    /**
     * List scheduled cost exports
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-exports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostExport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-exports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostExport => CostExport::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run a cost export now
     *
     * Runs the export immediately against the same code path the poller uses, writing every period
     * in the restatement window. Answers 200 with `status: "failed"` and a message rather than an
     * error status when the destination rejects the write — the caller wants the reason, and the
     * same failure is recorded on the export.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-exports/{id}/run
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostExportRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-exports/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostExportRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a cost export
     *
     * Replaces everything but the credential. Omit `accessKeyId`/`secretAccessKey`/`url` to keep
     * the stored credential; changing the destination type requires supplying a new one. Saving
     * reschedules the export from now.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/cost-exports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostExportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostExport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-exports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostExport::fromArray(Coerce::toArray($data));
    }
}
