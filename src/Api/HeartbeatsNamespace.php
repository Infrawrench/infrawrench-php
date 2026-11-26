<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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
use Infrawrench\Sdk\Model\Heartbeat;
use Infrawrench\Sdk\Model\HeartbeatCreate;
use Infrawrench\Sdk\Model\HeartbeatList;
use Infrawrench\Sdk\Model\HeartbeatPings;
use Infrawrench\Sdk\Model\HeartbeatSuggestions;
use Infrawrench\Sdk\Model\HeartbeatUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->heartbeats` */
final class HeartbeatsNamespace extends ApiNamespace
{
    /**
     * Create a heartbeat
     *
     * Create a heartbeat with a schedule and grace period. It stays `new` until its first ping,
     * then goes down whenever a ping is later than the schedule plus grace. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/heartbeats
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
    public function create(HeartbeatCreate $body, ?string $orgId = null, ?RequestOptions $options = null): Heartbeat
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/heartbeats',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Heartbeat::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a heartbeat
     *
     * Remove the heartbeat and its ping history. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/heartbeats/{heartbeatId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $heartbeatId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/heartbeats/{heartbeatId}',
                pathParams: ['orgId' => $orgId, 'heartbeatId' => $heartbeatId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List heartbeat monitors
     *
     * Every heartbeat in the organization with its status, schedule, ping URL, last ping and next
     * deadline.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/heartbeats
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): HeartbeatList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/heartbeats',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return HeartbeatList::fromArray(Coerce::toArray($data));
    }

    /**
     * Read a heartbeat's ping history
     *
     * Recent pings, newest first, with each run's duration where a `/start` opened it. Kept for 30
     * days.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/heartbeats/{heartbeatId}/pings
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function pings(string $heartbeatId, ?string $orgId = null, ?string $limit = null, ?RequestOptions $options = null): HeartbeatPings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/heartbeats/{heartbeatId}/pings',
                pathParams: ['orgId' => $orgId, 'heartbeatId' => $heartbeatId],
                query: ['limit' => $limit],
            ),
            $options,
        );

        return HeartbeatPings::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a heartbeat's ping URL
     *
     * Issue a new secret ping URL. The old one stops working at once. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/heartbeats/{heartbeatId}/rotate-token
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rotateToken(string $heartbeatId, ?string $orgId = null, ?RequestOptions $options = null): Heartbeat
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/heartbeats/{heartbeatId}/rotate-token',
                pathParams: ['orgId' => $orgId, 'heartbeatId' => $heartbeatId],
            ),
            $options,
        );

        return Heartbeat::fromArray(Coerce::toArray($data));
    }

    /**
     * Suggest scheduled resources to watch
     *
     * Scheduled jobs, pipelines and functions from the organization's synced resources (the fields
     * their plugins flag as a schedule), with each schedule read into cron or an interval. A read
     * over stored state; no provider API calls.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/heartbeats/suggestions
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $resourceId Only this resource's schedule.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function suggestions(?string $orgId = null, ?string $resourceId = null, ?RequestOptions $options = null): HeartbeatSuggestions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/heartbeats/suggestions',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return HeartbeatSuggestions::fromArray(Coerce::toArray($data));
    }

    /**
     * Update, pause or resume a heartbeat
     *
     * Edit the name, schedule or grace period, or toggle `enabled`. A schedule change recomputes
     * the deadline from the last ping. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/heartbeats/{heartbeatId}
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
    public function update(string $heartbeatId, HeartbeatUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): Heartbeat
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/heartbeats/{heartbeatId}',
                pathParams: ['orgId' => $orgId, 'heartbeatId' => $heartbeatId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Heartbeat::fromArray(Coerce::toArray($data));
    }
}
