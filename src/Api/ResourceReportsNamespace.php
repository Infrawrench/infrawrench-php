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
use Infrawrench\Sdk\Model\CostReportFolder;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\ResourceReport;
use Infrawrench\Sdk\Model\ResourceReportInput;
use Infrawrench\Sdk\Model\ResourceReportOptions;
use Infrawrench\Sdk\Model\ResourceReportQueryRequest;
use Infrawrench\Sdk\Model\ResourceReportRows;
use Infrawrench\Sdk\RequestOptions;

/** `$client->resourceReports` */
final class ResourceReportsNamespace extends ApiNamespace
{
    /** `$client->resourceReports->csv` */
    public readonly ResourceReportsCsvNamespace $csv;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->csv = new ResourceReportsCsvNamespace($this->transport);
    }

    /**
     * Create a resource report
     *
     * The creator is the report's implicit owner for sharing. Filing it in a folder needs editor
     * access to the folder. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/resource-reports
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?ResourceReportInput $body = null, ?RequestOptions $options = null): ResourceReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resource-reports',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ResourceReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a resource report
     *
     * Soft delete; its sharing goes with it. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/resource-reports/{id}
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
                path: '/api/org/{orgId}/resource-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List report folders for resource reports
     *
     * The report folders the caller can see. Resource reports share the folder tree cost reports
     * use; create and rename folders through `/cost-report-folders`.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/folders
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostReportFolder>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function folders(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/folders',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostReportFolder => CostReportFolder::fromArray(Coerce::toArray($item)));
    }

    /**
     * Read a resource report
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): ResourceReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return ResourceReport::fromArray(Coerce::toArray($data));
    }

    /**
     * List resource reports
     *
     * The saved inventory reports the caller's sharing lets them open, by name.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<ResourceReport>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): ResourceReport => ResourceReport::fromArray(Coerce::toArray($item)));
    }

    /**
     * What a resource report can filter and show
     *
     * Providers, accounts, resource types, regions and statuses with resource counts, the metadata
     * fields the given types expose (from the type definitions and the newest synced resources),
     * provider tag keys and, with `costs:read`, virtual tag keys.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/options
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $types Comma-separated `pluginId/resourceTypeId` pairs narrowing `fields`.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function options(?string $orgId = null, ?string $types = null, ?RequestOptions $options = null): ResourceReportOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/options',
                pathParams: ['orgId' => $orgId],
                query: ['types' => $types],
            ),
            $options,
        );

        return ResourceReportOptions::fromArray(Coerce::toArray($data));
    }

    /**
     * Run an unsaved resource report config
     *
     * A read despite the method. Returns one page of rows. Cost and virtual tag cells need
     * `costs:read` and respect the caller's cost visibility scope.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/resource-reports/query
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(?string $orgId = null, ?ResourceReportQueryRequest $body = null, ?RequestOptions $options = null): ResourceReportRows
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/resource-reports/query',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ResourceReportRows::fromArray(Coerce::toArray($data));
    }

    /**
     * Run a saved resource report
     *
     * One page of rows. `sort` and `direction` override the saved sort for this request only.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/{id}/rows
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $sort `<kind>:<key>`. `core:name|type|provider|account|region|status|created|external_id`; `field:<key>` a key of the resource's synced fields (offered by `GET /resource-reports/options`); `tag:<key>` a provider tag; `vtag:<key>` a virtual tag, read from the resource's own cost rows over `costRange` (the value holding the most spend); `cost:range|mtd|previous_month` spend joined by provider resource id.
     * @param 'asc'|'desc'|null $direction
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rows(string $id, ?string $orgId = null, ?int $offset = null, ?int $limit = null, ?string $sort = null, ?string $direction = null, ?RequestOptions $options = null): ResourceReportRows
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/{id}/rows',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['offset' => $offset, 'limit' => $limit, 'sort' => $sort, 'direction' => $direction],
            ),
            $options,
        );

        return ResourceReportRows::fromArray(Coerce::toArray($data));
    }

    /**
     * Values one tag key takes
     *
     * Provider tag values from synced resources, or virtual tag values from spend (empty without
     * `costs:read`), most common first.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/resource-reports/tag-values
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'tag'|'virtual_tag'|null $source
     * @return array{values: list<string>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function tagValues(string $key, ?string $orgId = null, ?string $source = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/resource-reports/tag-values',
                pathParams: ['orgId' => $orgId],
                query: ['source' => $source, 'key' => $key],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Replace a resource report
     *
     * Name, description, config and folder together. Needs editor. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/resource-reports/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?ResourceReportInput $body = null, ?RequestOptions $options = null): ResourceReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/resource-reports/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return ResourceReport::fromArray(Coerce::toArray($data));
    }
}
