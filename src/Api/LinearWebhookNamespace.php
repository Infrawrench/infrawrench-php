<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->linear->webhook` */
final class LinearWebhookNamespace extends ApiNamespace
{
    /**
     * Set up the issue status webhook
     *
     * `auto` creates a webhook in Linear for `Issue` events on all public teams, signed with a
     * secret Infrawrench generates (Linear allows this for workspace admins only). `manual`
     * records a webhook somebody created in Linear's settings at the URL from `POST
     * /linear/webhook/url`, with the signing secret Linear showed them. Replaces any webhook set
     * up before.
     *
     * _Requires permission: `linear:write`._
     *
     * POST /api/org/{orgId}/linear/webhook
     *
     * Raises on 400: Bad request
     *
     * Raises on 502: Linear refused or was unreachable
     *
     * @param array{mode: 'auto'}|array{mode: 'manual', signingSecret: string} $body
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(array $body, ?string $orgId = null, ?RequestOptions $options = null): IssueWebhookSetupResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/linear/webhook',
                pathParams: ['orgId' => $orgId],
                body: $body,
                hasBody: true,
            ),
            $options,
        );

        return IssueWebhookSetupResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove the issue status webhook
     *
     * Deletes the webhook in Linear when Infrawrench created it. Statuses keep refreshing through
     * the poll.
     *
     * _Requires permission: `linear:write`._
     *
     * DELETE /api/org/{orgId}/linear/webhook
     *
     * Raises on 404: Not found
     *
     * Raises on 502: Linear refused or was unreachable
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
                path: '/api/org/{orgId}/linear/webhook',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get the receiver URL for a hand-made Linear webhook
     *
     * Linear shows a webhook's signing secret only after it exists, so the URL comes first; record
     * the secret afterwards with `POST /linear/webhook` in `manual` mode.
     *
     * _Requires permission: `linear:write`._
     *
     * POST /api/org/{orgId}/linear/webhook/url
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{url: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function url(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/linear/webhook/url',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
