<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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
use Infrawrench\Sdk\Model\InfraenvCommitRequest;
use Infrawrench\Sdk\Model\InfraenvCommitResult;
use Infrawrench\Sdk\Model\InfraenvDescribeRequest;
use Infrawrench\Sdk\Model\InfraenvDescribeResponse;
use Infrawrench\Sdk\Model\InfraenvRepoFile;
use Infrawrench\Sdk\Model\InfraenvRepoList;
use Infrawrench\Sdk\Model\InfraenvResolveRequest;
use Infrawrench\Sdk\Model\InfraenvResolveResponse;
use Infrawrench\Sdk\Model\InfraenvSourceList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->envFiles` */
final class EnvFilesNamespace extends ApiNamespace
{
    /**
     * Commit an .infraenv file to a repository
     *
     * Writes the file to the branch in one commit, or to a new branch with a pull request. The
     * text is checked first: a file with syntax errors is refused, so nothing unparseable is
     * committed. Values are never committed; the file only holds references.
     *
     * _Requires permission: `github-issues:write`._
     *
     * POST /api/org/{orgId}/env-files/commit
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The installation has not accepted the permission this needs. An owner of the
     * GitHub account approves it from `manageUrl`.
     *
     * Raises on 502: Bad gateway: an upstream service failed
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function commit(InfraenvCommitRequest $body, ?string $orgId = null, ?RequestOptions $options = null): InfraenvCommitResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/env-files/commit',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return InfraenvCommitResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Check an .infraenv file
     *
     * Parses the file and looks up every reference it makes, once per environment with that
     * environment's substitutions filled in: which resource, account and output each `resource()`
     * names or finds by name, and whether each `secret()` exists. Returns no values and calls no
     * provider.
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/env-files/describe
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function describe(InfraenvDescribeRequest $body, ?string $orgId = null, ?RequestOptions $options = null): InfraenvDescribeResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/env-files/describe',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return InfraenvDescribeResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Read an .infraenv file from a repository
     *
     * The file's text and blob sha on a branch (the default branch when omitted). A file that does
     * not exist yet answers 200 with `content: null`.
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/env-files/repo-file
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The installation has not accepted the permission this needs. An owner of the
     * GitHub account approves it from `manageUrl`.
     *
     * Raises on 502: Bad gateway: an upstream service failed
     *
     * @param string $repo `owner/name`.
     * @param string $path Path of the file in the repository. Defaults to `.infraenv` in the editors.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function repoFile(string $installationId, string $repo, string $path, ?string $orgId = null, ?string $branch = null, ?RequestOptions $options = null): InfraenvRepoFile
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/env-files/repo-file',
                pathParams: ['orgId' => $orgId],
                query: ['installationId' => $installationId, 'repo' => $repo, 'path' => $path, 'branch' => $branch],
            ),
            $options,
        );

        return InfraenvRepoFile::fromArray(Coerce::toArray($data));
    }

    /**
     * List repositories an .infraenv can be read from and committed to
     *
     * Every repository the organization's GitHub App installations can reach.
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/env-files/repos
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The installation has not accepted the permission this needs. An owner of the
     * GitHub account approves it from `manageUrl`.
     *
     * Raises on 502: Bad gateway: an upstream service failed
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function repos(?string $orgId = null, ?RequestOptions $options = null): InfraenvRepoList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/env-files/repos',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return InfraenvRepoList::fromArray(Coerce::toArray($data));
    }

    /**
     * Resolve an .infraenv file into .env values
     *
     * Resolves every variable of one environment: literals as written, `resource()` (by id, or by
     * plugin, type and name in this organization, after `${var}` substitution) through the
     * resource's provider, `secret()` from the organization's secrets. Returns the values in
     * plaintext along with the generated `.env` text, and records an audit entry naming the
     * variables (never their values). A variable that does not resolve is reported in `problems`
     * and left out. A file with syntax errors answers 400.
     *
     * _Requires permission: `secrets:read`._
     *
     * POST /api/org/{orgId}/env-files/resolve
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function resolve(InfraenvResolveRequest $body, ?string $orgId = null, ?RequestOptions $options = null): InfraenvResolveResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/env-files/resolve',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return InfraenvResolveResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List resources an .infraenv variable can reference
     *
     * Synced resources whose type declares outputs, each with those outputs and, where the type
     * has a secret export template, the variable name it suggests. Backs the editor's picker.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/env-files/sources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $q Matches the resource's name, id, type or account.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function sources(?string $orgId = null, ?string $q = null, ?string $limit = null, ?RequestOptions $options = null): InfraenvSourceList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/env-files/sources',
                pathParams: ['orgId' => $orgId],
                query: ['q' => $q, 'limit' => $limit],
            ),
            $options,
        );

        return InfraenvSourceList::fromArray(Coerce::toArray($data));
    }
}
