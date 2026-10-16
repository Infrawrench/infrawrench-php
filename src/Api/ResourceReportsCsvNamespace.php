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
use Infrawrench\Sdk\RequestOptions;

/** `$client->resourceReports->csv` */
final class ResourceReportsCsvNamespace extends ApiNamespace
{
    /**
     * Export an unsaved resource report config as CSV
     *
     * Every matching row up to 50,000, with tag and cost columns (one numeric column per cost
     * column and currency). A cut file ends with a `# Truncated` line.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resource-reports/csv
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{config: array<string, mixed>, name?: string}|null $body
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resource-reports/csv',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: $body !== null,
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Export a saved resource report as CSV
     *
     * Every matching row up to 50,000; a cut file ends with a `# Truncated` line.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/{id}/csv
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/{id}/csv',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
