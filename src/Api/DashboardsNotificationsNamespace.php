<?php

/*
 * infrawrench/sdk v1.57.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.57.0).
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
use Infrawrench\Sdk\Model\DashboardNotification;
use Infrawrench\Sdk\Model\DashboardNotificationInput;
use Infrawrench\Sdk\Model\DashboardNotificationSendResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ReportDeliveryTargets;
use Infrawrench\Sdk\RequestOptions;

/** `$client->dashboards->notifications` */
final class DashboardsNotificationsNamespace extends ApiNamespace
{
    /**
     * Create a dashboard delivery schedule
     *
     * On its cadence the server renders the dashboard as a PDF and sends a short summary (one line
     * per card with a figure to quote) and a deep link to the schedule's destinations, with the
     * PDF attached to emails and uploaded to Slack when `attachPdf` is on.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/dashboards/{id}/notifications
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, DashboardNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): DashboardNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DashboardNotification::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a dashboard delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/dashboards/{id}/notifications/{notificationId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, string $notificationId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/dashboards/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List a dashboard's delivery schedules
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/dashboards/{id}/notifications
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<DashboardNotification>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): DashboardNotification => DashboardNotification::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send a dashboard schedule now
     *
     * Renders and delivers immediately, ignoring the schedule and its enabled flag. Fails with a
     * 400 naming the reason when nothing could be delivered.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/dashboards/{id}/notifications/{notificationId}/send
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function send(string $id, string $notificationId, ?string $orgId = null, ?RequestOptions $options = null): DashboardNotificationSendResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/dashboards/{id}/notifications/{notificationId}/send',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return DashboardNotificationSendResult::fromArray(Coerce::toArray($data));
    }

    /**
     * List the destinations a dashboard schedule can deliver to
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/dashboards/{id}/notifications/targets
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(string $id, ?string $orgId = null, ?RequestOptions $options = null): ReportDeliveryTargets
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/dashboards/{id}/notifications/targets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ReportDeliveryTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a dashboard delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/dashboards/{id}/notifications/{notificationId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, string $notificationId, DashboardNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): DashboardNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/dashboards/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return DashboardNotification::fromArray(Coerce::toArray($data));
    }
}
