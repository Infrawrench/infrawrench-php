<?php

/*
 * infrawrench/sdk v1.59.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.59.0).
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
use Infrawrench\Sdk\Model\CustomCostDeleted;
use Infrawrench\Sdk\Model\CustomCostSource;
use Infrawrench\Sdk\Model\CustomCostSourceInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->customCostSources` */
final class CustomCostSourcesNamespace extends ApiNamespace
{
    /** `$client->customCostSources->uploads` */
    public readonly CustomCostSourcesUploadsNamespace $uploads;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->uploads = new CustomCostSourcesUploadsNamespace($this->transport);
    }

    /**
     * Create a custom cost source
     *
     * A named provider for spend Infrawrench has no plugin for. Fill it by uploading files (CSV or
     * FOCUS) from Settings, `infrawrench costs push --format csv|focus`, or the upload endpoints
     * below.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/custom-cost-sources
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CustomCostSourceInput $body, ?string $orgId = null, ?RequestOptions $options = null): CustomCostSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/custom-cost-sources',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomCostSource::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a custom cost source and all of its spend
     *
     * Zeroes every cost row the source holds, then deletes it with its upload history. The spend
     * disappears from every report, budget and export.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/custom-cost-sources/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): CustomCostDeleted
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/custom-cost-sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CustomCostDeleted::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a custom cost source
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/custom-cost-sources/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): CustomCostSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-cost-sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CustomCostSource::fromArray(Coerce::toArray($data));
    }

    /**
     * List custom cost sources
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/custom-cost-sources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<CustomCostSource>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/custom-cost-sources',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): CustomCostSource => CustomCostSource::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update a custom cost source
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/custom-cost-sources/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CustomCostSourceInput $body, ?string $orgId = null, ?RequestOptions $options = null): CustomCostSource
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/custom-cost-sources/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CustomCostSource::fromArray(Coerce::toArray($data));
    }
}
