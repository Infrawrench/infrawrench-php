<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
use Infrawrench\Sdk\Model\IssueWebhookSetupResult;
use Infrawrench\Sdk\Model\JiraWebhookInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->jira->webhook` */
final class JiraWebhookNamespace extends ApiNamespace
{
    /**
     * Set up the issue status webhook
     *
     * `auto` (the default) registers a webhook in Jira for `jira:issue_updated` and
     * `jira:issue_deleted` through the stored account, which Jira allows for administrators only.
     * When Jira refuses, the reply falls back to manual and carries the URL and a one-time
     * `secret` for an administrator to paste into Jira's webhook form. `manual` skips the attempt.
     * Replaces any webhook set up before.
     *
     * _Requires permission: `jira:write`._
     *
     * POST /api/org/{orgId}/jira/webhook
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Jira refused or was unreachable
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?JiraWebhookInput $body = null, ?RequestOptions $options = null): IssueWebhookSetupResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/jira/webhook',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return IssueWebhookSetupResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove the issue status webhook
     *
     * Deletes the webhook in Jira when Infrawrench registered it. Statuses keep refreshing through
     * the poll.
     *
     * _Requires permission: `jira:write`._
     *
     * DELETE /api/org/{orgId}/jira/webhook
     *
     * Raises on 404: Not found
     *
     * Raises on 502: Jira refused or was unreachable
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
                path: '/api/org/{orgId}/jira/webhook',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
