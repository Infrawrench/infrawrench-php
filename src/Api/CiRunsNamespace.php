<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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
}
