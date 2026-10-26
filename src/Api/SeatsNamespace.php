<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\SeatListResponse;
use Infrawrench\Sdk\Model\SeatRemovalResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->seats` */
final class SeatsNamespace extends ApiNamespace
{
    /** `$client->seats->settings` */
    public readonly SeatsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new SeatsSettingsNamespace($this->transport);
    }

    /**
     * List paid SaaS seats and seat savings findings
     *
     * Every paid seat the organization's connected accounts report (Copilot, Cursor, GitLab, Okta
     * and others), collected daily, with three findings: inactive for the organization's
     * threshold, the same person (by email) paying for two tools in one category, and a cheaper
     * tier the member's usage fits. Each finding carries remediation commands.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/seats
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): SeatListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/seats',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SeatListResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Re-collect seats now
     *
     * Makes every seat-capable account due; the poller collects within minutes.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/seats/refresh
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{queued: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function refresh(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/seats/refresh',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Remove a flagged seat
     *
     * Removes a seat currently flagged inactive or duplicated through the provider's API and
     * records the realized saving. Refused (409) for a seat that is not a finding. Blocked by an
     * active change freeze (423).
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/seats/{seatId}/remove
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
    public function remove(string $seatId, ?string $orgId = null, ?RequestOptions $options = null): SeatRemovalResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/seats/{seatId}/remove',
                pathParams: ['orgId' => $orgId, 'seatId' => $seatId],
            ),
            $options,
        );

        return SeatRemovalResponse::fromArray(Coerce::toArray($data));
    }
}
