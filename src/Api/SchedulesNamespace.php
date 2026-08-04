<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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
use Infrawrench\Sdk\Model\SleepSchedule;
use Infrawrench\Sdk\Model\SleepScheduleCreate;
use Infrawrench\Sdk\Model\SleepScheduleList;
use Infrawrench\Sdk\Model\SleepSchedulePreview;
use Infrawrench\Sdk\Model\SleepSchedulePreviewRequest;
use Infrawrench\Sdk\Model\SleepScheduleUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->schedules` */
final class SchedulesNamespace extends ApiNamespace
{
    /**
     * Create a sleep/wake schedule
     *
     * Attach an off-at/on-at weekly window to a resource. The resource's type must declare
     * lifecycle start/stop actions (see the resource type metadata); one schedule per resource.
     * Times are wall-clock in the given IANA timezone and remain correct across DST. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/schedules
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The resource already has a schedule
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?SleepScheduleCreate $body = null, ?RequestOptions $options = null): SleepSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/schedules',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SleepSchedule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a schedule
     *
     * Remove the schedule. The resource is left in whatever state it is in. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/schedules/{scheduleId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $scheduleId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/schedules/{scheduleId}',
                pathParams: ['orgId' => $orgId, 'scheduleId' => $scheduleId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List sleep/wake schedules
     *
     * Every schedule in the organization with its next transition, last run outcome and a
     * projected monthly saving computed from trailing per-resource spend and the weekly off-hours
     * fraction. Schedules attach to resources whose plugin declares lifecycle start/stop actions;
     * the poller executes due transitions server-side.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/schedules
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SleepScheduleList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/schedules',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SleepScheduleList::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview a schedule's projected saving
     *
     * Quote a timing against a resource before saving: the weekly off-hours fraction, the
     * resource's trailing spend normalized to a month, the projected monthly saving, and the next
     * few transitions. Makes no provider API calls and changes nothing.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/schedules/preview
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(?string $orgId = null, ?SleepSchedulePreviewRequest $body = null, ?RequestOptions $options = null): SleepSchedulePreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/schedules/preview',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SleepSchedulePreview::fromArray(Coerce::toArray($data));
    }

    /**
     * Update or pause a schedule
     *
     * Edit the timing and/or toggle `paused`. Any change recomputes the next transition; pausing
     * clears it. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/schedules/{scheduleId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $scheduleId, ?string $orgId = null, ?SleepScheduleUpdate $body = null, ?RequestOptions $options = null): SleepSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/schedules/{scheduleId}',
                pathParams: ['orgId' => $orgId, 'scheduleId' => $scheduleId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SleepSchedule::fromArray(Coerce::toArray($data));
    }
}
