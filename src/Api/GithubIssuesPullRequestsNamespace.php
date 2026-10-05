<?php

/*
 * infrawrench/sdk v1.60.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.60.0).
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
use Infrawrench\Sdk\Model\GithubPullRequestInput;
use Infrawrench\Sdk\Model\GithubPullRequestResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->githubIssues->pullRequests` */
final class GithubIssuesPullRequestsNamespace extends ApiNamespace
{
    /**
     * Open an IaC pull request for a finding
     *
     * Creates a branch, commits the one-file change and opens a pull request against the mapped
     * base branch. Never merged automatically.
     *
     * _Requires permission: `github-issues:write`._
     *
     * POST /api/org/{orgId}/github-issues/pull-requests
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: The GitHub App installation needs a permission an owner has not approved yet
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(GithubPullRequestInput $body, ?string $orgId = null, ?RequestOptions $options = null): GithubPullRequestResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/github-issues/pull-requests',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return GithubPullRequestResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview an IaC pull request for a finding
     *
     * Reads only. Says what the pull request would change (one file, as a diff), or why the change
     * is not mechanical.
     *
     * _Requires permission: `github-issues:write`._
     *
     * POST /api/org/{orgId}/github-issues/pull-requests/preview
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: The GitHub App installation needs a permission an owner has not approved yet
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{eligible: bool, repo: array<string, mixed>|null, baseBranch: string, path: string, terraformAddress: string, title: string, body: string, diff: string}|array{eligible: bool, reason: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(GithubPullRequestInput $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/github-issues/pull-requests/preview',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return $data;
    }
}
