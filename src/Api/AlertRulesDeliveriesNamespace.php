<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
use Infrawrench\Sdk\Model\AlertDelivery;
use Infrawrench\Sdk\RequestOptions;

/** `$client->alertRules->deliveries` */
final class AlertRulesDeliveriesNamespace extends ApiNamespace
{
    /**
     * Acknowledge an alert, cancelling its escalation
     *
     * A conditional update: only a delivery still in `awaiting_ack` can move, so two people
     * pressing at once produce one acknowledgement and an alert that already escalated cannot be
     * retroactively silenced.
     *
     * POST /api/org/{orgId}/alert-rules/deliveries/{id}/ack
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{acknowledged: bool, alreadyAcknowledgedBy?: string|null, reason?: 'not_pending'|'already_escalated'|'already_acknowledged', title?: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function ack(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/alert-rules/deliveries/{id}/ack',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Drop held or awaiting-acknowledgement deliveries
     *
     * POST /api/org/{orgId}/alert-rules/deliveries/cancel
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{ids: list<string>}|null $body
     * @return array{cancelled: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function cancel(?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/alert-rules/deliveries/cancel',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * List recent held and escalating alerts
     *
     * Only alerts a rule created follow-up work for appear here: one held by quiet hours, or one
     * waiting on an acknowledgement. An alert that went straight out leaves no row.
     *
     * GET /api/org/{orgId}/alert-rules/deliveries
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AlertDelivery>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/alert-rules/deliveries',
                pathParams: ['orgId' => $orgId],
                query: ['limit' => $limit],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AlertDelivery => AlertDelivery::fromArray(Coerce::toArray($item)));
    }
}
