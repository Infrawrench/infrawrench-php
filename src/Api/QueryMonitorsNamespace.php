<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\QueryMonitor;
use Infrawrench\Sdk\Model\QueryMonitorCreate;
use Infrawrench\Sdk\Model\QueryMonitorTargets;
use Infrawrench\Sdk\Model\QueryMonitorTestResult;
use Infrawrench\Sdk\Model\QueryMonitorUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->queryMonitors` */
final class QueryMonitorsNamespace extends ApiNamespace
{
    /** `$client->queryMonitors->get` */
    public readonly QueryMonitorsGetNamespace $get;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new QueryMonitorsGetNamespace($this->transport);
    }

    /**
     * Create a query monitor
     *
     * A monitor may only run `select`, `with`, `show` or `explain`, and only a **single**
     * statement. That is a deliberate allowlist of leading keywords rather than a denylist of
     * dangerous ones: a denylist has to be right about every dialect's spelling of every
     * destructive verb, forever, and only has to be wrong once. Comments are stripped before the
     * check, so `-- harmless\nDROP TABLE x` is rejected, and `SELECT 1; DROP TABLE x` is rejected
     * by the single-statement rule.
     *
     * Takes `resources:execute`, like the SQL editor: saving a monitor arranges for a query to run
     * against a customer database on a schedule, forever, which is a strictly larger act than
     * running one while watching it.
     *
     * POST /api/org/{orgId}/query-monitors
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
    public function create(?string $orgId = null, ?QueryMonitorCreate $body = null, ?RequestOptions $options = null): QueryMonitor
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/query-monitors',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return QueryMonitor::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a query monitor
     *
     * DELETE /api/org/{orgId}/query-monitors/{monitorId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $monitorId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/query-monitors/{monitorId}',
                pathParams: ['orgId' => $orgId, 'monitorId' => $monitorId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List what a monitor can run against
     *
     * The editor's target picker: each account with a SQL driver of its own, plus the SQL-capable
     * resources inside it — a database that is a *resource* (a ClickHouse service, a D1 or Turso
     * database, a Databricks SQL warehouse, a BigQuery dataset) rather than the account's own
     * connection. Accounts with neither are omitted; a monitor pointed at one could only ever
     * fail. Pass a resource's `id` (and optionally its `resourceTypeId` — the server fills it from
     * the synced resource either way) when creating a monitor to scope the query to that resource.
     *
     * GET /api/org/{orgId}/query-monitors/targets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(?string $orgId = null, ?RequestOptions $options = null): QueryMonitorTargets
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/query-monitors/targets',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return QueryMonitorTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a query once without saving it
     *
     * The editor's 'try it' button. Goes through the same read-only guard as a scheduled run — a
     * query that could not be saved as a monitor must not be runnable through the monitor's own
     * preview — and applies the threshold, so the answer says whether it *would* be breaching
     * rather than leaving the reader to compare two numbers.
     *
     * POST /api/org/{orgId}/query-monitors/test
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function test(?string $orgId = null, ?QueryMonitorCreate $body = null, ?RequestOptions $options = null): QueryMonitorTestResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/query-monitors/test',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return QueryMonitorTestResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit a query monitor
     *
     * Omitted fields are left alone and the result is validated after merging. Changing the query,
     * the mode, the operator or the threshold **re-arms** the monitor: the stored breach streak
     * was accumulated against a different question, and carrying it forward would fire an alert on
     * the first run of a rule nobody has tested.
     *
     * PATCH /api/org/{orgId}/query-monitors/{monitorId}
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
    public function update(string $monitorId, ?string $orgId = null, ?QueryMonitorUpdate $body = null, ?RequestOptions $options = null): QueryMonitor
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/query-monitors/{monitorId}',
                pathParams: ['orgId' => $orgId, 'monitorId' => $monitorId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return QueryMonitor::fromArray(Coerce::toArray($data));
    }
}
