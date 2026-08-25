<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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
use Infrawrench\Sdk\Model\CostReport;
use Infrawrench\Sdk\Model\CostReportInput;
use Infrawrench\Sdk\Model\CostReportRunResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReports` */
final class CostReportsNamespace extends ApiNamespace
{
    /** `$client->costReports->notifications` */
    public readonly CostReportsNotificationsNamespace $notifications;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->notifications = new CostReportsNotificationsNamespace($this->transport);
    }

    /**
     * Create a cost report
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-reports
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-reports',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost report
     *
     * Soft delete. Every dashboard card pointing at the report is removed with it — a card whose
     * report is gone could only ever render as an unavailable tile.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/cost-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a cost report
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List saved cost reports
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-reports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostReport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-reports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostReport => CostReport::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run a cost report
     *
     * Executes the report's saved config and returns the series, along with the inclusive window a
     * relative preset resolved to. Takes no body: the report *is* the query, so a caller never has
     * to reassemble its config to get the numbers.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/cost-reports/{id}/run
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostReportRunResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-reports/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostReportRunResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a cost report
     *
     * Replaces the report's name, description, config and folder. Every dashboard showing the
     * report picks up the new config — that is what referencing a report by id buys.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-reports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostReportInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostReport::fromArray(Coerce::toArray($data));
    }
}
