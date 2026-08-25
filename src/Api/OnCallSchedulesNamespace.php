<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\OnCallSchedule;
use Infrawrench\Sdk\Model\OnCallScheduleCreate;
use Infrawrench\Sdk\Model\OnCallScheduleList;
use Infrawrench\Sdk\Model\OnCallScheduleUpdate;
use Infrawrench\Sdk\Model\OnCallShiftsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->onCall->schedules` */
final class OnCallSchedulesNamespace extends ApiNamespace
{
    /**
     * Create an on-call rotation
     *
     * Shift boundaries are calendar-day arithmetic in the rotation's own zone, not 24-hour
     * arithmetic: a rotation stepped in fixed milliseconds drifts an hour at each daylight-saving
     * change until the 09:00 Monday handover happens at 08:00 — or until two people each think the
     * other is on call.
     *
     * Writing takes `org:settings:write`: a rotation decides who gets woken up.
     *
     * POST /api/org/{orgId}/on-call/schedules
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?OnCallScheduleCreate $body = null, ?RequestOptions $options = null): OnCallSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/on-call/schedules',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return OnCallSchedule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an on-call rotation
     *
     * Takes its covers with it. Routing rules naming it resolve to nobody afterwards.
     *
     * DELETE /api/org/{orgId}/on-call/schedules/{scheduleId}
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
                path: '/api/org/{orgId}/on-call/schedules/{scheduleId}',
                pathParams: ['orgId' => $orgId, 'scheduleId' => $scheduleId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List on-call rotations
     *
     * GET /api/org/{orgId}/on-call/schedules
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): OnCallScheduleList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/on-call/schedules',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return OnCallScheduleList::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview upcoming shifts
     *
     * The same computation the alert path resolves with, so a preview can never disagree with who
     * actually gets woken up.
     *
     * GET /api/org/{orgId}/on-call/schedules/{scheduleId}/shifts
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function shifts(string $scheduleId, ?string $orgId = null, ?int $count = null, ?RequestOptions $options = null): OnCallShiftsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/on-call/schedules/{scheduleId}/shifts',
                pathParams: ['orgId' => $orgId, 'scheduleId' => $scheduleId],
                query: ['count' => $count],
            ),
            $options,
        );

        return OnCallShiftsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit an on-call rotation
     *
     * Omitted fields are left alone, and the result is validated after merging. Sending
     * `participantUserIds` replaces the list wholesale — position is rotation order, so reordering
     * re-plans the future.
     *
     * PATCH /api/org/{orgId}/on-call/schedules/{scheduleId}
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
    public function update(string $scheduleId, ?string $orgId = null, ?OnCallScheduleUpdate $body = null, ?RequestOptions $options = null): OnCallSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/on-call/schedules/{scheduleId}',
                pathParams: ['orgId' => $orgId, 'scheduleId' => $scheduleId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return OnCallSchedule::fromArray(Coerce::toArray($data));
    }
}
