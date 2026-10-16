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
use Infrawrench\Sdk\Model\IssueStatusRefreshResult;
use Infrawrench\Sdk\Model\JiraIssueLink;
use Infrawrench\Sdk\Model\JiraSourceKind;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jira->links` */
final class JiraLinksNamespace extends ApiNamespace
{
    /**
     * Look up filed issues for a set of findings
     *
     * _Requires permission: `jira:read`._
     *
     * GET /api/org/{orgId}/jira/links
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param JiraSourceKind::*|null $sourceKind
     * @param list<string>|null $sourceId Repeat to narrow to specific findings. Omit to return every link of the kind; this is the batch lookup a list view makes once instead of one request per row.
     * @return list<JiraIssueLink>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $sourceKind = null, ?array $sourceId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jira/links',
                pathParams: ['orgId' => $orgId],
                query: ['sourceKind' => $sourceKind, 'sourceId' => $sourceId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JiraIssueLink => JiraIssueLink::fromArray(Coerce::toArray($item)));
    }

    /**
     * Refresh the status of filed Jira issues now
     *
     * Reads up to 200 of the org's filed issues from Jira (least recently checked first) instead
     * of waiting for a webhook or the poll.
     *
     * _Requires permission: `jira:read`._
     *
     * POST /api/org/{orgId}/jira/links/refresh
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Jira refused or was unreachable
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
                path: '/api/org/{orgId}/jira/links/refresh',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return IssueStatusRefreshResult::fromArray(Coerce::toArray($data));
    }
}
