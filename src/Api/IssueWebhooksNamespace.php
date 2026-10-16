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
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\RequestOptions;

/** `$client->issueWebhooks` */
final class IssueWebhooksNamespace extends ApiNamespace
{
    /** `$client->issueWebhooks->jira` */
    public readonly IssueWebhooksJiraNamespace $jira;

    /** `$client->issueWebhooks->linear` */
    public readonly IssueWebhooksLinearNamespace $linear;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->jira = new IssueWebhooksJiraNamespace($this->transport);
        $this->linear = new IssueWebhooksLinearNamespace($this->transport);
    }

    /**
     * Inbound GitHub App webhook for issue status
     *
     * The GitHub App's webhook URL. `X-Hub-Signature-256` is verified with the server's
     * `GITHUB_APP_WEBHOOK_SECRET`; `issues` events update the status of filed issues and `ping` is
     * acknowledged. Every other event is ignored.
     *
     * POST /api/issue-webhooks/github
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
    public function github(?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/issue-webhooks/github',
                accept: 'empty',
            ),
            $options,
        );
    }
}
