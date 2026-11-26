<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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
use Infrawrench\Sdk\Model\CommitmentReport;
use Infrawrench\Sdk\Model\CommitmentReportInput;
use Infrawrench\Sdk\Model\CommitmentReportRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->commitments->reports` */
final class CommitmentsReportsNamespace extends ApiNamespace
{
    /**
     * Create a commitment report
     *
     * Stored exactly as sent. The creator is the report's implicit owner for sharing; filing it in
     * a folder needs editor access to the folder. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/commitments/reports
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CommitmentReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CommitmentReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/commitments/reports',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CommitmentReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a commitment report
     *
     * Soft delete; its sharing goes with it. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/commitments/reports/{id}
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
                path: '/api/org/{orgId}/commitments/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a commitment report
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/commitments/reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CommitmentReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/commitments/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CommitmentReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List saved commitment reports
     *
     * The saved commitment reports the caller's sharing lets them open, by name.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/commitments/reports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CommitmentReport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/commitments/reports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CommitmentReport => CommitmentReport::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run a saved commitment report
     *
     * A relative date range resolves against today on every run, and a range reaching past today
     * ends today.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/commitments/reports/{id}/run
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): CommitmentReportRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/commitments/reports/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CommitmentReportRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a commitment report
     *
     * Name, description, config and folder together. Needs editor. Moving it to another folder
     * needs editor access to that folder. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/commitments/reports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CommitmentReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CommitmentReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/commitments/reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CommitmentReport::fromArray(Coerce::toArray($data));
    }
}
