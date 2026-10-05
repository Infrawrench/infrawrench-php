<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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
use Infrawrench\Sdk\Model\BusinessMetricImportRun;
use Infrawrench\Sdk\Model\BusinessMetricImporter;
use Infrawrench\Sdk\Model\BusinessMetricImporterInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->businessMetrics->importer` */
final class BusinessMetricsImporterNamespace extends ApiNamespace
{
    /**
     * Delete a metric's importer
     *
     * Stops importing and drops the run history. Values already imported stay.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/business-metrics/{id}/importer
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/business-metrics/{id}/importer',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a metric's importer
     *
     * `importer` is null when the metric's values are only pushed.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics/{id}/importer
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{importer: array<string, mixed>|null}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics/{id}/importer',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Run a metric's importer now
     *
     * Runs synchronously and returns the finished run, failed or not. With no body it reads the
     * importer's own window; `from`/`to` backfill a wider one (at most 730 days).
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/business-metrics/{id}/importer/run
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{from?: string, to?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): BusinessMetricImportRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/business-metrics/{id}/importer/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return BusinessMetricImportRun::fromArray(Coerce::toArray($data));
    }

    /**
     * List a metric's import runs
     *
     * Newest first; the most recent 50 are kept.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/business-metrics/{id}/importer/runs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param int|null $limit Default 20.
     * @return array{runs: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function runs(string $id, ?string $orgId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/business-metrics/{id}/importer/runs',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['limit' => $limit],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Create or replace a metric's importer
     *
     * One importer per metric. A full replace: omitted fields take their defaults. Each run
     * restates whole days (every label a day carried is replaced by what the source returned),
     * never touches days the source returned nothing for, and ignores points outside the window.
     * Changing the account, the params or the schedule makes it due immediately.
     *
     * _Requires permission: `resources:execute`._
     *
     * PUT /api/org/{orgId}/business-metrics/{id}/importer
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Metric id or key
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, BusinessMetricImporterInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?BusinessMetricImporter
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/business-metrics/{id}/importer',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): BusinessMetricImporter => BusinessMetricImporter::fromArray(Coerce::toArray($value)));
    }
}
