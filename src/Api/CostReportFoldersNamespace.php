<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
use Infrawrench\Sdk\Model\CostReportFolder;
use Infrawrench\Sdk\Model\CostReportFolderInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costReportFolders` */
final class CostReportFoldersNamespace extends ApiNamespace
{
    /**
     * Create a cost-report folder
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-report-folders
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostReportFolderInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostReportFolder
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-report-folders',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostReportFolder::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a cost-report folder
     *
     * Never blocked by contents and never destructive to them: the folder's reports and immediate
     * subfolders fall back to the top level. Deleting a folder cannot delete a report.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-report-folders/{id}
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
                path: '/api/org/{orgId}/cost-report-folders/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List cost-report folders
     *
     * The org's report folders as a flat list — build the tree from `parentFolderId`. Folders
     * organize the Reports list and nothing else; a report's id, URL and dashboard cards are
     * unchanged by where it is filed.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-report-folders
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CostReportFolder>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-report-folders',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CostReportFolder => CostReportFolder::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a cost-report folder
     *
     * Rename and/or reparent. Filing a *report* is not here — that is `PUT /cost-reports/{id}`
     * with a different `folderId`. Reparenting past the 3-level depth limit, or under the folder's
     * own subtree, is a 400.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-report-folders/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostReportFolderInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostReportFolder
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-report-folders/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostReportFolder::fromArray(Coerce::toArray($data));
    }
}
