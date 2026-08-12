<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
use Infrawrench\Sdk\Model\CreateJiraIssueInput;
use Infrawrench\Sdk\Model\CreateJiraIssueResult;
use Infrawrench\Sdk\Model\JiraIntegration;
use Infrawrench\Sdk\Model\JiraIntegrationInput;
use Infrawrench\Sdk\Model\JiraIssueLink;
use Infrawrench\Sdk\Model\JiraSourceKind;
use Infrawrench\Sdk\Model\JiraVerifyInput;
use Infrawrench\Sdk\Model\JiraVerifyResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jira` */
final class JiraNamespace extends ApiNamespace
{
    /** `$client->jira->projects` */
    public readonly JiraProjectsNamespace $projects;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->projects = new JiraProjectsNamespace($this->transport);
    }

    /**
     * Disconnect Jira
     *
     * Issue links already recorded are kept, so filed findings stay marked as filed.
     *
     * _Requires permission: `jira:write`._
     *
     * DELETE /api/org/{orgId}/jira
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/jira',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get the org's Jira connection
     *
     * The stored API token is never returned; `tokenHint` stands in for it.
     *
     * _Requires permission: `jira:read`._
     *
     * GET /api/org/{orgId}/jira
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{integration: array<string, mixed>|null}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jira',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * File a finding as a Jira issue
     *
     * Creates the issue, then records the link between it and the finding. The link is what lets a
     * list view show "already filed" instead of offering the button again.
     *
     * _Requires permission: `jira:write`._
     *
     * POST /api/org/{orgId}/jira/issues
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Jira refused to create the issue, or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function issues(CreateJiraIssueInput $body, ?string $orgId = null, ?RequestOptions $options = null): CreateJiraIssueResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jira/issues',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CreateJiraIssueResult::fromArray(Coerce::toArray($data));
    }

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
     * @param list<string>|null $sourceId Repeat to narrow to specific findings. Omit to return every link of the kind — this is the batch lookup a list view makes once instead of one request per row.
     * @return list<JiraIssueLink>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function links(?string $orgId = null, ?string $sourceKind = null, ?array $sourceId = null, ?RequestOptions $options = null): array
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
     * Connect Jira, or update the connection
     *
     * _Requires permission: `jira:write`._
     *
     * PUT /api/org/{orgId}/jira
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(JiraIntegrationInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?JiraIntegration
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/jira',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): JiraIntegration => JiraIntegration::fromArray(Coerce::toArray($value)));
    }

    /**
     * Check Jira credentials
     *
     * Calls GET /rest/api/3/myself on the site, so a wrong email or a revoked token is reported on
     * the settings form rather than on the first attempt to file an issue.
     *
     * _Requires permission: `jira:write`._
     *
     * POST /api/org/{orgId}/jira/verify
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Jira rejected the credentials or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function verify(?string $orgId = null, ?JiraVerifyInput $body = null, ?RequestOptions $options = null): JiraVerifyResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jira/verify',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return JiraVerifyResult::fromArray(Coerce::toArray($data));
    }
}
