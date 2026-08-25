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
use Infrawrench\Sdk\Model\CalendarSubscription;
use Infrawrench\Sdk\Model\CalendarSubscriptionCreate;
use Infrawrench\Sdk\Model\CalendarSubscriptionList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->calendar->subscriptions` */
final class CalendarSubscriptionsNamespace extends ApiNamespace
{
    /**
     * Mint an iCalendar subscription URL
     *
     * Returns the only copy of the feed URL. The token in it is 32 random bytes, stored as a
     * SHA-256 hash, and is the sole credential on a route that runs outside every auth layer —
     * treat the URL as a secret. The URL deliberately contains no organization id.
     *
     * An organization may hold 25 live subscriptions; revoking makes room.
     *
     * POST /api/org/{orgId}/calendar/subscriptions
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?CalendarSubscriptionCreate $body = null, ?RequestOptions $options = null): CalendarSubscription
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/calendar/subscriptions',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return CalendarSubscription::fromArray(Coerce::toArray($data));
    }

    /**
     * Revoke an iCalendar subscription
     *
     * The URL stops working immediately. The row is kept, and revoking twice is not an error.
     *
     * DELETE /api/org/{orgId}/calendar/subscriptions/{subscriptionId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $subscriptionId, ?string $orgId = null, ?RequestOptions $options = null): CalendarSubscription
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/calendar/subscriptions/{subscriptionId}',
                pathParams: ['orgId' => $orgId, 'subscriptionId' => $subscriptionId],
            ),
            $options,
        );

        return CalendarSubscription::fromArray(Coerce::toArray($data));
    }

    /**
     * List the organization's iCalendar subscriptions
     *
     * Feed URLs that have been minted, including revoked ones — a revoked row is kept so the audit
     * trail still resolves. The token itself is never returned.
     *
     * GET /api/org/{orgId}/calendar/subscriptions
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CalendarSubscriptionList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/calendar/subscriptions',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CalendarSubscriptionList::fromArray(Coerce::toArray($data));
    }
}
