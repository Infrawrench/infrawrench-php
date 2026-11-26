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
use Infrawrench\Sdk\Model\GitForgeNamespace;
use Infrawrench\Sdk\Model\GitForgeNamespaceInput;
use Infrawrench\Sdk\Model\GitForgeOverview;
use Infrawrench\Sdk\Model\GitForgeRepositoryList;
use Infrawrench\Sdk\Model\GitForgeSettingsInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->git` */
final class GitNamespace extends ApiNamespace
{
    /**
     * The organisation's namespace on git.infrawrench.com and its usage
     *
     * The namespace (null until claimed), the plan's limits for private repositories and their
     * storage, and what the namespace uses. Public repositories are free and count toward no
     * limit.
     *
     * _Requires permission: `git:read`._
     *
     * GET /api/org/{orgId}/git
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): GitForgeOverview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/git',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return GitForgeOverview::fromArray(Coerce::toArray($data));
    }

    /**
     * Claim or rename the organisation's namespace
     *
     * Claims the namespace when the organisation has none, renames it otherwise. A rename moves no
     * repository, and URLs under the old name stop resolving. 400 when the name breaks the forge's
     * rules or is reserved, 409 when someone has it.
     *
     * _Requires permission: `git:admin`._
     *
     * PUT /api/org/{orgId}/git/namespace
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function namespace(GitForgeNamespaceInput $body, ?string $orgId = null, ?RequestOptions $options = null): GitForgeNamespace
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/git/namespace',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return GitForgeNamespace::fromArray(Coerce::toArray($data));
    }

    /**
     * The organisation's repositories on git.infrawrench.com
     *
     * Most recently pushed first, private ones included, each with its open pull requests and the
     * latest CI run of its default branch. At most 500; the forge lists the rest.
     *
     * _Requires permission: `git:read`._
     *
     * GET /api/org/{orgId}/git/repositories
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function repositories(?string $orgId = null, ?RequestOptions $options = null): GitForgeRepositoryList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/git/repositories',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return GitForgeRepositoryList::fromArray(Coerce::toArray($data));
    }

    /**
     * Set what a new repository starts as
     *
     * 404 until the organisation has claimed a namespace.
     *
     * _Requires permission: `git:admin`._
     *
     * PUT /api/org/{orgId}/git/settings
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function settings(GitForgeSettingsInput $body, ?string $orgId = null, ?RequestOptions $options = null): GitForgeNamespace
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/git/settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return GitForgeNamespace::fromArray(Coerce::toArray($data));
    }
}
