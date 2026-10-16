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
use Infrawrench\Sdk\Model\CostExportJob;
use Infrawrench\Sdk\Model\CostExportJobRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->exports->jobs` */
final class CostsExportsJobsNamespace extends ApiNamespace
{
    /**
     * Start a background cost export
     *
     * Queues an export of a saved report (`reportId`) or an ad-hoc scope (`query`) as CSV, NDJSON
     * or FOCUS CSV, and answers at once with the job. The file is written on the gateway in the
     * background; poll `GET /costs/exports/jobs/{jobId}` for `progress` and download from
     * `downloadUrl` once `status` is `succeeded`. Up to 731 days per job and 256 MB per file;
     * three queued or running jobs per person. Rows are read inside the caller's cost visibility,
     * and what is exported is fixed when the job is created, so editing the report afterwards does
     * not change the file.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/costs/exports/jobs
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
    public function create(CostExportJobRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CostExportJob
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/exports/jobs',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostExportJob::fromArray(Coerce::toArray($data));
    }

    /**
     * Cancel an export job or delete its file
     *
     * Cancels a queued or running job (the writer stops at its next chunk), or deletes a finished
     * file before it expires. Answers with the job's new state.
     *
     * _Requires permission: `costs:read`._
     *
     * DELETE /api/org/{orgId}/costs/exports/jobs/{jobId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $jobId, ?string $orgId = null, ?RequestOptions $options = null): CostExportJob
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/costs/exports/jobs/{jobId}',
                pathParams: ['orgId' => $orgId, 'jobId' => $jobId],
            ),
            $options,
        );

        return CostExportJob::fromArray(Coerce::toArray($data));
    }

    /**
     * Download an export job's file
     *
     * The finished file, streamed. 409 while the job is still queued or running (or failed); 410
     * once the file has expired or been deleted.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/exports/jobs/{jobId}/download
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 410: Gone: the file expired or was deleted
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function download(string $jobId, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/exports/jobs/{jobId}/download',
                pathParams: ['orgId' => $orgId, 'jobId' => $jobId],
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * List your recent export jobs
     *
     * The caller's 20 most recent export jobs, newest first. Jobs are private to their creator.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/exports/jobs
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{jobs: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/exports/jobs',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get an export job's status
     *
     * Status, progress, row count, error and, once finished, the download path and expiry.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/exports/jobs/{jobId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdCostsExportsJobsJobId(string $jobId, ?string $orgId = null, ?RequestOptions $options = null): CostExportJob
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/exports/jobs/{jobId}',
                pathParams: ['orgId' => $orgId, 'jobId' => $jobId],
            ),
            $options,
        );

        return CostExportJob::fromArray(Coerce::toArray($data));
    }
}
