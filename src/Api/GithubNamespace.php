<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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
use Infrawrench\Sdk\Model\GithubAppRepos;
use Infrawrench\Sdk\Model\GithubAppStatus;
use Infrawrench\Sdk\Model\GithubInstallUrl;
use Infrawrench\Sdk\RequestOptions;

/** `$client->github` */
final class GithubNamespace extends ApiNamespace
{
    /** `$client->github->installations` */
    public readonly GithubInstallationsNamespace $installations;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->installations = new GithubInstallationsNamespace($this->transport);
    }

    /**
     * GitHub App install URL
     *
     * _Requires permission: `dashboards:write`._
     *
     * GET /api/org/{orgId}/github/install-url
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'agents'|'workflows'|'settings/github-issues'|'settings/pr-checks'|'ci'|null $return The page (under the organization) the install flow returns to. Anything else: `agents`.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function installUrl(?string $orgId = null, ?string $return = null, ?RequestOptions $options = null): GithubInstallUrl
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github/install-url',
                pathParams: ['orgId' => $orgId],
                query: ['return' => $return],
            ),
            $options,
        );

        return GithubInstallUrl::fromArray(Coerce::toArray($data));
    }

    /**
     * Repositories the organization's installations can access
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/github/repos
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function repos(?string $orgId = null, ?RequestOptions $options = null): GithubAppRepos
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github/repos',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return GithubAppRepos::fromArray(Coerce::toArray($data));
    }

    /**
     * GitHub App connection status
     *
     * _Requires permission: `dashboards:read`._
     *
     * GET /api/org/{orgId}/github/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): GithubAppStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return GithubAppStatus::fromArray(Coerce::toArray($data));
    }
}
