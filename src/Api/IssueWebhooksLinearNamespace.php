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
use Infrawrench\Sdk\RequestOptions;

/** `$client->issueWebhooks->linear` */
final class IssueWebhooksLinearNamespace extends ApiNamespace
{
    /**
     * Inbound Linear webhook for issue status
     *
     * Called by Linear, not by clients. The token in the path picks the organization;
     * `Linear-Signature` (hex HMAC-SHA256 of the raw body) authenticates the delivery, and
     * `webhookTimestamp` must be within a minute. Handles `Issue` create, update and remove.
     *
     * POST /api/issue-webhooks/linear/{token}
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
                path: '/api/issue-webhooks/linear/{token}',
                pathParams: ['token' => $token],
                accept: 'empty',
            ),
            $options,
        );
    }
}
