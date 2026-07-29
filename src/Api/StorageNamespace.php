<?php

/*
 * infrawrench/sdk v0.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.13.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\StorageListRequest;
use Infrawrench\Sdk\Model\StorageObject;
use Infrawrench\Sdk\Model\StoragePathRequest;
use Infrawrench\Sdk\Model\StorageUploadForm;
use Infrawrench\Sdk\RequestOptions;

/** `$client->storage` */
final class StorageNamespace extends ApiNamespace
{
    /**
     * Delete a storage object
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/storage/delete
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(StoragePathRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/storage/delete',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Download one or many objects (zipped if more than one)
     *
     * _Requires permission: `storage:read`._
     *
     * GET /api/org/{orgId}/v1/storage/download
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param string $keys JSON-encoded array of object keys, e.g. `["a.txt","b.txt"]`
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function download(string $accountId, string $bucket, string $keys, ?string $orgId = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/v1/storage/download',
                pathParams: ['orgId' => $orgId],
                query: ['accountId' => $accountId, 'bucket' => $bucket, 'keys' => $keys],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * List objects in a bucket / prefix
     *
     * _Requires permission: `storage:read`._
     *
     * POST /api/org/{orgId}/storage/list
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<StorageObject>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(StorageListRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/storage/list',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): StorageObject => StorageObject::fromArray(Coerce::toArray($item)));
    }

    /**
     * Create a folder marker in a bucket
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/storage/mkdir
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function mkdir(StoragePathRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/storage/mkdir',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Upload a file to object storage
     *
     * Multipart/form-data. Plugin must implement `uploadStorageObject`.
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/v1/storage/upload
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param StorageUploadForm $body Sent as `multipart/form-data`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function upload(StorageUploadForm $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/v1/storage/upload',
                pathParams: ['orgId' => $orgId],
                form: $body->toArray(),
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
