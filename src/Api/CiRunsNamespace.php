<?php

/*
 * infrawrench/sdk v1.106.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.106.0).
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
use Infrawrench\Sdk\Model\CiDownloadLink;
use Infrawrench\Sdk\Model\CiRun;
use Infrawrench\Sdk\Model\CiRunDetail;
use Infrawrench\Sdk\Model\CiRunStatus;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->ci->runs` */
final class CiRunsNamespace extends ApiNamespace
{
    /**
     * Approve a fork's pull request commit
     *
     * Runs CI for this one commit of a pull request from a fork, without the organization's or
     * repository's secrets. A later commit needs approving again.
     *
     * _Requires permission: `ci:approve`._
     *
     * POST /api/org/{orgId}/ci/runs/{runId}/approve
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(string $runId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/runs/{runId}/approve',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Cancel a CI run
     *
     * A queued run, or one waiting for its concurrency group, ends as cancelled at once. A running
     * one is stopped by its runner, its running jobs as a timeout would stop them, and ends as
     * cancelled once the runner reports it. A run waiting for approval is rejected instead.
     *
     * _Requires permission: `ci:approve`._
     *
     * POST /api/org/{orgId}/ci/runs/{runId}/cancel
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function cancel(string $runId, ?string $orgId = null, ?RequestOptions $options = null): CiRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/runs/{runId}/cancel',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
            ),
            $options,
        );

        return CiRun::fromArray(Coerce::toArray($data));
    }

    /**
     * A short-lived link to a file a job kept for download
     *
     * The link is signed for this one file for 15 minutes (less when the file expires sooner) and
     * is served by the CI proxy, not this API.
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/runs/{runId}/download
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string $job The job's id, as the run's `jobs` list it.
     * @param string $path The file's `path`, as the job's `downloads` list it.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function download(string $runId, string $job, string $path, ?string $orgId = null, ?RequestOptions $options = null): CiDownloadLink
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/runs/{runId}/download',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
                query: ['job' => $job, 'path' => $path],
            ),
            $options,
        );

        return CiDownloadLink::fromArray(Coerce::toArray($data));
    }

    /**
     * List CI runs, newest first
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/runs
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param CiRunStatus::*|null $status
     * @return array{runs: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $status = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/runs',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * A CI run, with each job's output once it has finished
     *
     * _Requires permission: `ci:read`._
     *
     * GET /api/org/{orgId}/ci/runs/{runId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdCiRunsRunId(string $runId, ?string $orgId = null, ?RequestOptions $options = null): CiRunDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/ci/runs/{runId}',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
            ),
            $options,
        );

        return CiRunDetail::fromArray(Coerce::toArray($data));
    }

    /**
     * Decline to run a fork's pull request commit
     *
     * _Requires permission: `ci:approve`._
     *
     * POST /api/org/{orgId}/ci/runs/{runId}/reject
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function reject(string $runId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/runs/{runId}/reject',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a finished CI run again
     *
     * Queues a new run of the same repository, commit, branch and event, linked to this one. A run
     * waiting for approval is approved instead, and a fork's pull request still runs without
     * secrets.
     *
     * _Requires permission: `ci:approve`._
     *
     * POST /api/org/{orgId}/ci/runs/{runId}/retry
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param array{noTaskCache?: bool} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function retry(string $runId, array $body, ?string $orgId = null, ?RequestOptions $options = null): CiRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/ci/runs/{runId}/retry',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return CiRun::fromArray(Coerce::toArray($data));
    }
}
