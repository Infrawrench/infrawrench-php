<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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
use Infrawrench\Sdk\Model\SqlEstimateRequest;
use Infrawrench\Sdk\Model\SqlExecuteRequest;
use Infrawrench\Sdk\Model\SqlExecuteResponse;
use Infrawrench\Sdk\Model\SqlQueryRequest;
use Infrawrench\Sdk\Model\SqlQueryResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sql` */
final class SqlNamespace extends ApiNamespace
{
    /**
     * Dry-run cost estimate (e.g. BigQuery byte scan)
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/sql/estimate
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array<string, mixed>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function estimate(SqlEstimateRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sql/estimate',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Run an INSERT/UPDATE/DELETE/DDL statement
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/sql/execute
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function execute(SqlExecuteRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SqlExecuteResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sql/execute',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SqlExecuteResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a read-only SQL query
     *
     * Routes to the right driver: REST `executeQuery` (BigQuery, Databricks), per-resource SQL
     * driver (Neon, Turso) or account-level SQL driver (Postgres, MySQL).
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/sql/query
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return SqlQueryResponse|array<string, mixed>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(SqlQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): SqlQueryResponse|array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sql/query',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return $data;
    }
}
