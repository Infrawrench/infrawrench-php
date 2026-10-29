<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->eventSubscriptions->deliveries` */
final class EventSubscriptionsDeliveriesNamespace extends ApiNamespace
{
    /**
     * List event deliveries
     *
     * The delivery log, newest first. Kept for 30 days.
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/event-subscriptions/deliveries
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'pending'|'retrying'|'succeeded'|'dead'|'skipped'|null $state
     * @param string|null $before Page backwards.
     * @return array{deliveries: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $subscriptionId = null, ?string $state = null, ?string $eventType = null, ?int $limit = null, ?string $before = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/event-subscriptions/deliveries',
                pathParams: ['orgId' => $orgId],
                query: ['subscriptionId' => $subscriptionId, 'state' => $state, 'eventType' => $eventType, 'limit' => $limit, 'before' => $before],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Redeliver an event
     *
     * Queues a fresh delivery of the same envelope (same event id) with its own retry ladder.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/event-subscriptions/deliveries/{id}/redeliver
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{delivery: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function redeliver(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/event-subscriptions/deliveries/{id}/redeliver',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
