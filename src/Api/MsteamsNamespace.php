<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
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
use Infrawrench\Sdk\Model\MsTeamsStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->msteams` */
final class MsteamsNamespace extends ApiNamespace
{
    /** `$client->msteams->webhooks` */
    public readonly MsteamsWebhooksNamespace $webhooks;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->webhooks = new MsteamsWebhooksNamespace($this->transport);
    }

    /**
     * List the organization's Teams channels
     *
     * Returns the Teams channels alerts can be routed to. Which alerts reach each one is decided
     * by /alert-rules. Webhook URLs are never included.
     *
     * GET /api/org/{orgId}/msteams/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): MsTeamsStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/msteams/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return MsTeamsStatus::fromArray(Coerce::toArray($data));
    }

    /**
     * Post a test card to every configured Teams channel
     *
     * Ignores routing rules — every channel gets the test. Fails with the error Microsoft returned
     * when nothing could be delivered (HTTP 404 usually means the Workflow was deleted or turned
     * off).
     *
     * POST /api/org/{orgId}/msteams/test
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool, webhookCount: int, attempted: int, succeeded: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function test(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/msteams/test',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
