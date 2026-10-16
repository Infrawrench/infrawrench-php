<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
use Infrawrench\Sdk\Model\GithubIssueLink;
use Infrawrench\Sdk\Model\GithubIssueSourceKind;
use Infrawrench\Sdk\Model\IssueStatusRefreshResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->githubIssues->links` */
final class GithubIssuesLinksNamespace extends ApiNamespace
{
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
    public function list(?string $orgId = null, ?string $sourceKind = null, ?string $state = null, ?array $sourceId = null, ?RequestOptions $options = null): array
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
     * Refresh the status of filed GitHub issues now
     *
     * Reads up to 200 of the org's filed issues from GitHub (least recently checked first) instead
     * of waiting for the App's webhook or the poll. An issue GitHub no longer has is recorded as
     * deleted.
     *
     * _Requires permission: `github-issues:read`._
     *
     * POST /api/org/{orgId}/github-issues/links/refresh
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
    public function refresh(?string $orgId = null, ?RequestOptions $options = null): IssueStatusRefreshResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/github-issues/links/refresh',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return IssueStatusRefreshResult::fromArray(Coerce::toArray($data));
    }
}
