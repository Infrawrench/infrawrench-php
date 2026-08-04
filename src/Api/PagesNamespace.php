<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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
use Infrawrench\Sdk\Model\PageClearResponse;
use Infrawrench\Sdk\Model\PageRequest;
use Infrawrench\Sdk\Model\PageResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->pages` */
final class PagesNamespace extends ApiNamespace
{
    /**
     * Raise an alert to the organization's on-call transports
     *
     * Fans an alert out over whatever the org has configured — Twilio SMS (and voice on request),
     * mobile push, Slack channels, and Microsoft Teams webhooks — honouring each recipient's
     * opt-ins. This is the same alert a workflow raises with `infra.page(...)`, for code that runs
     * somewhere Infrawrench does not: a health check, a deploy script, a cron on a box.
     *
     * Repeat pages under the same `(source, key)` are **suppressed, not rejected**: a monitor that
     * fires every minute pages once and then gets `200` with `suppressed: true` and the `retryAt`
     * at which the key can page again. A page that reached nobody does not start a cooldown, so
     * the next call tries again.
     *
     * Recipients opt in per channel under the same setting that covers workflow pages.
     *
     * _Requires permission: `pages:write`._
     *
     * POST /api/org/{orgId}/pages
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(PageRequest $body, ?string $orgId = null, ?RequestOptions $options = null): PageResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/pages',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return PageResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Clear a page key's cooldown
     *
     * Drops the cooldown for one `(source, key)` so the next page under it delivers immediately.
     * Call it when the condition you alerted on recovers — the workflow equivalent is
     * `infra.page.clear(key)`. Clearing a key that was never paged is not an error.
     *
     * _Requires permission: `pages:write`._
     *
     * DELETE /api/org/{orgId}/pages
     *
     * Raises on 400: Bad request
     *
     * @param string $source Stable name for the system raising the page: letters, digits, `.`, `_` and `-`. It is the notification's sender, and it scopes the cooldown — two services paging under the same key never throttle each other.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $key Defaults to `default`.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $source, ?string $orgId = null, ?string $key = null, ?RequestOptions $options = null): PageClearResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/pages',
                pathParams: ['orgId' => $orgId],
                query: ['source' => $source, 'key' => $key],
            ),
            $options,
        );

        return PageClearResponse::fromArray(Coerce::toArray($data));
    }
}
