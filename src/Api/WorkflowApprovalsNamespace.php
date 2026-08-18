<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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
use Infrawrench\Sdk\Model\WorkflowApproval;
use Infrawrench\Sdk\Model\WorkflowApprovalStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->workflowApprovals` */
final class WorkflowApprovalsNamespace extends ApiNamespace
{
    /**
     * Approve a pending workflow approval request
     *
     * The suspended run resumes within a few seconds of the decision landing.
     *
     * _Requires permission: `workflows:approve`._
     *
     * POST /api/org/{orgId}/workflow-approvals/{id}/approve
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function approve(string $id, ?string $orgId = null, ?RequestOptions $options = null): WorkflowApproval
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflow-approvals/{id}/approve',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return WorkflowApproval::fromArray(Coerce::toArray($data));
    }

    /**
     * Deny a pending workflow approval request
     *
     * Denial fails the waiting `infra.waitForApproval(...)` call in the run.
     *
     * _Requires permission: `workflows:approve`._
     *
     * POST /api/org/{orgId}/workflow-approvals/{id}/deny
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deny(string $id, ?string $orgId = null, ?RequestOptions $options = null): WorkflowApproval
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflow-approvals/{id}/deny',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return WorkflowApproval::fromArray(Coerce::toArray($data));
    }

    /**
     * List workflow approval requests
     *
     * Approval requests raised by `infra.waitForApproval(...)` inside workflow runs, newest first.
     * Filter with `status=pending` to build an approvals inbox.
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflow-approvals
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param WorkflowApprovalStatus::*|null $status
     * @return list<WorkflowApproval>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $status = null, ?string $workflowId = null, ?string $runId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflow-approvals',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'workflowId' => $workflowId, 'runId' => $runId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): WorkflowApproval => WorkflowApproval::fromArray(Coerce::toArray($item)));
    }
}
