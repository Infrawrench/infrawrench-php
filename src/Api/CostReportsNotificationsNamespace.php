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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ReportDeliveryTargets;
use Infrawrench\Sdk\Model\ReportNotification;
use Infrawrench\Sdk\Model\ReportNotificationInput;
use Infrawrench\Sdk\Model\ReportNotificationSendResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReports->notifications` */
final class CostReportsNotificationsNamespace extends ApiNamespace
{
    /**
     * Create a delivery schedule
     *
     * On its cadence the server runs the report and sends a composed text summary — period total
     * (converted to the org's display currency where configured, with the conversion caveat),
     * change vs the previous period, top groups, and a deep link. No chart images. An empty result
     * still sends, saying so.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-reports/{id}/notifications
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, ReportNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): ReportNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-reports/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ReportNotification::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}
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
                path: '/api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List a report's delivery schedules
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}/notifications
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ReportNotification>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ReportNotification => ReportNotification::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send a schedule's report now
     *
     * Runs the report and delivers it to this schedule's destinations immediately, ignoring the
     * schedule and its enabled flag. Fails with a 400 naming the reason when nothing could be
     * delivered. A successful manual send clears a parked failure — it is the documented recovery
     * for a partial delivery.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}/send
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function send(string $id, string $notificationId, ?string $orgId = null, ?RequestOptions $options = null): ReportNotificationSendResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}/send',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return ReportNotificationSendResult::fromArray(Coerce::toArray($data));
    }

    /**
     * List the destinations a schedule can deliver to
     *
     * The org's live Slack channels and Teams webhooks, and whether this deployment can send mail.
     * Destinations are picked from here — a schedule can only point at surfaces the org already
     * connected.
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}/notifications/targets
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
                path: '/api/org/{orgId}/cost-reports/{id}/notifications/targets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ReportDeliveryTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, string $notificationId, ReportNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): ReportNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-reports/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ReportNotification::fromArray(Coerce::toArray($data));
    }
}
