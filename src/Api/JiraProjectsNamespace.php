<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\JiraIssueType;
use Infrawrench\Sdk\Model\JiraProject;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jira->projects` */
final class JiraProjectsNamespace extends ApiNamespace
{
    /**
     * List issue types valid in a project
     *
     * Reads the project's own create metadata rather than the global issue-type list, so the
     * picker cannot offer a type the project's scheme would reject. Subtasks are excluded.
     *
     * _Requires permission: `jira:read`._
     *
     * GET /api/org/{orgId}/jira/projects/{key}/issue-types
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JiraIssueType>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function issueTypes(string $key, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jira/projects/{key}/issue-types',
                pathParams: ['orgId' => $orgId, 'key' => $key],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JiraIssueType => JiraIssueType::fromArray(Coerce::toArray($item)));
    }

    /**
     * List Jira projects
     *
     * Backs the project picker, so nobody has to know a project key by hand.
     *
     * _Requires permission: `jira:read`._
     *
     * GET /api/org/{orgId}/jira/projects
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<JiraProject>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/jira/projects',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): JiraProject => JiraProject::fromArray(Coerce::toArray($item)));
    }
}
