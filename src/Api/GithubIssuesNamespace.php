<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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
use Infrawrench\Sdk\Model\FileGithubIssueInput;
use Infrawrench\Sdk\Model\FileGithubIssueResult;
use Infrawrench\Sdk\Model\GithubAssignee;
use Infrawrench\Sdk\Model\GithubIssueLink;
use Infrawrench\Sdk\Model\GithubIssueRouteResolution;
use Infrawrench\Sdk\Model\GithubIssueSettings;
use Infrawrench\Sdk\Model\GithubIssueSettingsInput;
use Infrawrench\Sdk\Model\GithubIssueSourceKind;
use Infrawrench\Sdk\Model\GithubIssuesStatus;
use Infrawrench\Sdk\Model\GithubLabel;
use Infrawrench\Sdk\RequestOptions;

/** `$client->githubIssues` */
final class GithubIssuesNamespace extends ApiNamespace
{
    /** `$client->githubIssues->pullRequests` */
    public readonly GithubIssuesPullRequestsNamespace $pullRequests;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->pullRequests = new GithubIssuesPullRequestsNamespace($this->transport);
    }

    /**
     * List a repository's assignable users
     *
     * Backs the assignee picker.
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues/assignees
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: The GitHub App installation needs a permission an owner has not approved yet
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<GithubAssignee>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function assignees(int $installationId, string $repo, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues/assignees',
                pathParams: ['orgId' => $orgId],
                query: ['installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): GithubAssignee => GithubAssignee::fromArray(Coerce::toArray($item)));
    }

    /**
     * List a repository's branches
     *
     * Backs the base-branch picker for Terraform sources.
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues/branches
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: The GitHub App installation needs a permission an owner has not approved yet
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<string>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function branches(int $installationId, string $repo, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues/branches',
                pathParams: ['orgId' => $orgId],
                query: ['installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): string => Coerce::toString($item));
    }

    /**
     * Get GitHub issue settings and installation access
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): GithubIssuesStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return GithubIssuesStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * File a finding as a GitHub issue
     *
     * Opens an issue in the routed repository, or comments on the open issue already filed for the
     * same finding (matched by fingerprint, including a hidden marker in issue bodies).
     *
     * _Requires permission: `github-issues:write`._
     *
     * POST /api/org/{orgId}/github-issues/issues
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
    public function issues(FileGithubIssueInput $body, ?string $orgId = null, ?RequestOptions $options = null): FileGithubIssueResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/github-issues/issues',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return FileGithubIssueResult::fromArray(Coerce::toArray($data));
    }

    /**
     * List a repository's labels
     *
     * Backs the label picker.
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues/labels
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: The GitHub App installation needs a permission an owner has not approved yet
     *
     * Raises on 502: GitHub refused the request or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<GithubLabel>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function labels(int $installationId, string $repo, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues/labels',
                pathParams: ['orgId' => $orgId],
                query: ['installationId' => $installationId, 'repo' => $repo],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): GithubLabel => GithubLabel::fromArray(Coerce::toArray($item)));
    }

    /**
     * Look up filed GitHub issues for a set of findings
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues/links
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param GithubIssueSourceKind::*|null $sourceKind
     * @param 'open'|'closed'|null $state
     * @param list<string>|null $sourceId
     * @return list<GithubIssueLink>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function links(?string $orgId = null, ?string $sourceKind = null, ?string $state = null, ?array $sourceId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues/links',
                pathParams: ['orgId' => $orgId],
                query: ['sourceKind' => $sourceKind, 'state' => $state, 'sourceId' => $sourceId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): GithubIssueLink => GithubIssueLink::fromArray(Coerce::toArray($item)));
    }

    /**
     * Resolve where a finding would be filed
     *
     * _Requires permission: `github-issues:read`._
     *
     * GET /api/org/{orgId}/github-issues/route
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function route(?string $orgId = null, ?string $resourceId = null, ?RequestOptions $options = null): GithubIssueRouteResolution
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/github-issues/route',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId],
            ),
            $options,
        );

        return GithubIssueRouteResolution::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace the GitHub issue settings
     *
     * Whole-document replace: route order is part of the meaning. Route and source ids are kept
     * when supplied.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/github-issues/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function settings(GithubIssueSettingsInput $body, ?string $orgId = null, ?RequestOptions $options = null): GithubIssueSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/github-issues/settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return GithubIssueSettings::fromArray(Coerce::toArray($data));
    }
}
