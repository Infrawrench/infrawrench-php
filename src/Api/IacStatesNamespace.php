<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\IacStateListResponse;
use Infrawrench\Sdk\Model\IacStateUploadRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->iac->states` */
final class IacStatesNamespace extends ApiNamespace
{
    /**
     * Upload a Terraform state document
     *
     * Parses a `.tfstate` (format version 4) or `terraform show -json` output (format_version 1.x)
     * and records the resource instances it contains. Attributes the state marks sensitive are
     * dropped before anything is written. The format version is checked, not assumed: an
     * unsupported version is a 400 rather than a partial read.
     *
     * POST /api/org/{orgId}/iac/states
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{state: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?IacStateUploadRequest $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/iac/states',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Delete an uploaded state document
     *
     * DELETE /api/org/{orgId}/iac/states/{stateId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $stateId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/iac/states/{stateId}',
                pathParams: ['orgId' => $orgId, 'stateId' => $stateId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List uploaded Terraform state documents
     *
     * Every state document the organization has uploaded, newest first. The documents themselves
     * are never stored — only the parsed, redacted projection.
     *
     * GET /api/org/{orgId}/iac/states
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): IacStateListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/iac/states',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return IacStateListResponse::fromArray(Coerce::toArray($data));
    }
}
