<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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
use Infrawrench\Sdk\Model\WorkflowScheduleInput;
use Infrawrench\Sdk\Model\WorkflowScheduleResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->workflows->schedule` */
final class WorkflowsScheduleNamespace extends ApiNamespace
{
    /**
     * Remove a workflow's cron schedule
     *
     * Reverts the workflow's trigger to manual and clears the pending fire time. A no-op when the
     * trigger is not cron.
     *
     * _Requires permission: `dashboards:write`._
     *
     * DELETE /api/org/{orgId}/workflows/{id}/schedule
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/workflows/{id}/schedule',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a workflow's cron schedule
     *
     * The schedule view of the workflow's trigger, with the next few computed fire times.
     * `schedule` is null when the workflow is triggered some other way (manual, git, budget).
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/schedule
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): WorkflowScheduleResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}/schedule',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return WorkflowScheduleResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Create or replace a workflow's cron schedule
     *
     * Sets the workflow's trigger to cron with the given expression and timezone, validating both,
     * and computes the next fire time. The workflow fires at the schedule's next occurrence —
     * never immediately on save.
     *
     * _Requires permission: `dashboards:write`._
     *
     * PUT /api/org/{orgId}/workflows/{id}/schedule
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, WorkflowScheduleInput $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowScheduleResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/workflows/{id}/schedule',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowScheduleResponse::fromArray(Coerce::toArray($data));
    }
}
