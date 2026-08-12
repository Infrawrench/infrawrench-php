<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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
use Infrawrench\Sdk\Model\LogCapableResourceList;
use Infrawrench\Sdk\Model\LogWorkspaceQuery;
use Infrawrench\Sdk\Model\LogWorkspaceQueryCreate;
use Infrawrench\Sdk\Model\LogWorkspaceQueryList;
use Infrawrench\Sdk\Model\LogWorkspaceQueryUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->logWorkspaces` */
final class LogWorkspacesNamespace extends ApiNamespace
{
    /**
     * Save a log workspace query
     *
     * Save a named multi-resource tail: up to 8 log streams plus a search expression, so the
     * workspace can be reopened. With `alertEnabled` the poller evaluates the query every few
     * minutes over a bounded tail window and notifies (push/Slack/Teams, `logMatchAlerts` trigger)
     * when a line matches, with a cooldown between alerts. Alerting requires a non-empty search
     * expression. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/log-workspaces
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A saved query with this name already exists
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(LogWorkspaceQueryCreate $body, ?string $orgId = null, ?RequestOptions $options = null): LogWorkspaceQuery
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/log-workspaces',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return LogWorkspaceQuery::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a saved log query
     *
     * Remove the saved query and stop any alerting it carried. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/log-workspaces/{queryId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $queryId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/log-workspaces/{queryId}',
                pathParams: ['orgId' => $orgId, 'queryId' => $queryId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List saved log queries
     *
     * Every saved log-workspace query in the organization: its name, the set of log streams it
     * tails, the search expression, the alert flag and the alert pass's last evaluation state. Log
     * text itself is fetched per resource via `POST
     * /api/org/{orgId}/resources/{pluginId}/{typeId}/logs`.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/log-workspaces
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): LogWorkspaceQueryList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/log-workspaces',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return LogWorkspaceQueryList::fromArray(Coerce::toArray($data));
    }

    /**
     * List log-capable resources
     *
     * Synced resources whose rendered detail declares the logs capability — the candidates a log
     * workspace can tail — plus sidecar streams reached through a peer integration (pods and
     * workloads inside a managed cluster, listed live from the provider and marked with
     * `parentResourceId`). Discovered from the plugin contract (never a hardcoded provider list),
     * capped at 500 results.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/log-workspaces/resources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resources(?string $orgId = null, ?RequestOptions $options = null): LogCapableResourceList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/log-workspaces/resources',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return LogCapableResourceList::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a saved log query
     *
     * Edit the name, resource set, search expression and/or the alert toggle. Changing the search
     * or the resources resets the alert pass's evaluation state; turning the alert on makes the
     * query due for evaluation immediately. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/log-workspaces/{queryId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A saved query with this name already exists
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $queryId, LogWorkspaceQueryUpdate $body, ?string $orgId = null, ?RequestOptions $options = null): LogWorkspaceQuery
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/log-workspaces/{queryId}',
                pathParams: ['orgId' => $orgId, 'queryId' => $queryId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return LogWorkspaceQuery::fromArray(Coerce::toArray($data));
    }
}
