<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\MsTeamsWebhook;
use Infrawrench\Sdk\Model\MsTeamsWebhookCreate;
use Infrawrench\Sdk\Model\MsTeamsWebhookUpdate;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->msteams->webhooks` */
final class MsteamsWebhooksNamespace extends ApiNamespace
{
    /**
     * Connect a Teams channel as an alert destination
     *
     * Adds a channel by webhook URL, or updates the one already holding that URL. Which alerts
     * reach it is decided by /alert-rules — connecting a channel routes nothing to it on its own.
     * Responds 400 when the URL is not https or its host is not Microsoft-operated.
     *
     * POST /api/org/{orgId}/msteams/webhooks
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?MsTeamsWebhookCreate $body = null, ?RequestOptions $options = null): MsTeamsWebhook
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/msteams/webhooks',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return MsTeamsWebhook::fromArray(Coerce::toArray($data));
    }

    /**
     * Disconnect a Teams channel
     *
     * DELETE /api/org/{orgId}/msteams/webhooks/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/msteams/webhooks/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Rename a Teams channel
     *
     * The webhook URL is immutable — remove the channel and re-add it to change it.
     *
     * PATCH /api/org/{orgId}/msteams/webhooks/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, ?string $orgId = null, ?MsTeamsWebhookUpdate $body = null, ?RequestOptions $options = null): MsTeamsWebhook
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/msteams/webhooks/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return MsTeamsWebhook::fromArray(Coerce::toArray($data));
    }
}
