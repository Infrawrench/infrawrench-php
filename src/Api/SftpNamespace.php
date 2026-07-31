<?php

/*
 * infrawrench/sdk v0.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.27.0).
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
use Infrawrench\Sdk\Model\SftpDeleteRequest;
use Infrawrench\Sdk\Model\SftpEntry;
use Infrawrench\Sdk\Model\SftpListRequest;
use Infrawrench\Sdk\Model\SftpPathRequest;
use Infrawrench\Sdk\Model\SftpUploadForm;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sftp` */
final class SftpNamespace extends ApiNamespace
{
    /**
     * Delete a file or directory over SFTP
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/sftp/delete
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(SftpDeleteRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sftp/delete',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Download one or many files via SFTP (zipped if more than one)
     *
     * _Requires permission: `storage:read`._
     *
     * GET /api/org/{orgId}/v1/sftp/download
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param string $paths JSON-encoded array of remote paths
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function download(string $accountId, string $paths, ?string $orgId = null, ?string $basePath = null, ?string $sshKeyId = null, ?string $sshHost = null, ?string $sshUsername = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/v1/sftp/download',
                pathParams: ['orgId' => $orgId],
                query: ['accountId' => $accountId, 'paths' => $paths, 'basePath' => $basePath, 'sshKeyId' => $sshKeyId, 'sshHost' => $sshHost, 'sshUsername' => $sshUsername],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * List a directory over SFTP
     *
     * _Requires permission: `storage:read`._
     *
     * POST /api/org/{orgId}/sftp/list
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SftpEntry>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(SftpListRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sftp/list',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SftpEntry => SftpEntry::fromArray(Coerce::toArray($item)));
    }

    /**
     * Create a directory over SFTP
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/sftp/mkdir
     *
     * Raises on 404: Not found
     *
     * Raises on 500: Server error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function mkdir(SftpPathRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/sftp/mkdir',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Upload a file via SFTP
     *
     * _Requires permission: `storage:write`._
     *
     * POST /api/org/{orgId}/v1/sftp/upload
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param SftpUploadForm $body Sent as `multipart/form-data`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function upload(SftpUploadForm $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/v1/sftp/upload',
                pathParams: ['orgId' => $orgId],
                form: $body->toArray(),
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
