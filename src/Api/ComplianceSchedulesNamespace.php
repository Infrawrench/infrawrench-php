<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\CompliancePackDeliveryTargets;
use Infrawrench\Sdk\Model\CompliancePackSchedule;
use Infrawrench\Sdk\Model\CompliancePackScheduleInput;
use Infrawrench\Sdk\Model\CompliancePackSendResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->compliance->schedules` */
final class ComplianceSchedulesNamespace extends ApiNamespace
{
    /**
     * Schedule an evidence pack
     *
     * Delivers the previous calendar month or quarter's pack: email attaches the ZIP, Slack
     * uploads it in the message thread, Teams gets the summary and a link. Packs render with full
     * access. Audited.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/compliance/schedules
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?CompliancePackScheduleInput $body = null, ?RequestOptions $options = null): CompliancePackSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/compliance/schedules',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return CompliancePackSchedule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an evidence-pack schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/compliance/schedules/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/compliance/schedules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Get an evidence-pack schedule
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/schedules/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CompliancePackSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/schedules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CompliancePackSchedule::fromArray(Coerce::toArray($data));
    }

    /**
     * List evidence-pack schedules
     *
     * _Requires permission: `audit:read`._
     *
     * GET /api/org/{orgId}/compliance/schedules
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $framework Framework registry id: `soc2` or `iso27001`.
     * @return list<CompliancePackSchedule>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $framework = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/schedules',
                pathParams: ['orgId' => $orgId],
                query: ['framework' => $framework],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CompliancePackSchedule => CompliancePackSchedule::fromArray(Coerce::toArray($item)));
    }

    /**
     * Send an evidence-pack schedule now
     *
     * Builds the pack the next delivery would cover and sends it immediately.
     *
     * _Requires permission: `org:settings:write`._
     *
     * POST /api/org/{orgId}/compliance/schedules/{id}/send
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function send(string $id, ?string $orgId = null, ?RequestOptions $options = null): CompliancePackSendResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/compliance/schedules/{id}/send',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CompliancePackSendResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Destinations a pack schedule can use
     *
     * _Requires permission: `org:settings:write`._
     *
     * GET /api/org/{orgId}/compliance/schedules/targets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(?string $orgId = null, ?RequestOptions $options = null): CompliancePackDeliveryTargets
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/compliance/schedules/targets',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CompliancePackDeliveryTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace an evidence-pack schedule
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/compliance/schedules/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?CompliancePackScheduleInput $body = null, ?RequestOptions $options = null): CompliancePackSchedule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/compliance/schedules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return CompliancePackSchedule::fromArray(Coerce::toArray($data));
    }
}
