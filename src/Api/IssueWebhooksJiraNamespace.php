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
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\RequestOptions;

/** `$client->issueWebhooks->jira` */
final class IssueWebhooksJiraNamespace extends ApiNamespace
{
    /**
     * Inbound Jira webhook for issue status
     *
     * Called by Jira, not by clients. The token in the path picks the organization;
     * `X-Hub-Signature: sha256=<hex>`, an HMAC of the raw body with the stored secret,
     * authenticates the delivery. Handles `jira:issue_updated` and `jira:issue_deleted`.
     *
     * POST /api/issue-webhooks/jira/{token}
     *
     * Raises on 401: The signature did not verify
     *
     * Raises on 404: Unknown token, or (GitHub) no webhook secret configured on the server
     *
     * Raises on 500: Processing failed; the tracker retries
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $token, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/issue-webhooks/jira/{token}',
                pathParams: ['token' => $token],
                accept: 'empty',
            ),
            $options,
        );
    }
}
