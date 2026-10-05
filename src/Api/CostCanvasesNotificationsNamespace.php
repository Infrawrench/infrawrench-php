<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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
use Infrawrench\Sdk\Model\CostCanvasNotification;
use Infrawrench\Sdk\Model\DashboardNotificationInput;
use Infrawrench\Sdk\Model\DashboardNotificationSendResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ReportDeliveryTargets;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costCanvases->notifications` */
final class CostCanvasesNotificationsNamespace extends ApiNamespace
{
    /**
     * Create a canvas delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-canvases/{id}/notifications
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $id, DashboardNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvasNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostCanvasNotification::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a canvas delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}
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
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List a canvas's delivery schedules
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-canvases/{id}/notifications
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostCanvasNotification>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostCanvasNotification => CostCanvasNotification::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send a canvas delivery now
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}/send
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
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}/send',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
            ),
            $options,
        );

        return DashboardNotificationSendResult::fromArray(Coerce::toArray($data));
    }

    /**
     * List the destinations a canvas schedule can deliver to
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/cost-canvases/{id}/notifications/targets
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
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications/targets',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ReportDeliveryTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a canvas delivery schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, string $notificationId, DashboardNotificationInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostCanvasNotification
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-canvases/{id}/notifications/{notificationId}',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'notificationId' => $notificationId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostCanvasNotification::fromArray(Coerce::toArray($data));
    }
}
