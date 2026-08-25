<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\CalendarResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->calendar` */
final class CalendarNamespace extends ApiNamespace
{
    /** `$client->calendar->subscriptions` */
    public readonly CalendarSubscriptionsNamespace $subscriptions;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->subscriptions = new CalendarSubscriptionsNamespace($this->transport);
    }

    /**
     * List dated operational events in a window
     *
     * One time axis over six things the organization already stores: change freezes, sleep/wake
     * schedules, declared deadlines (certificates, domains, keys and resource leases), commitment
     * term ends, cron-triggered workflow runs, and declared incidents. Nothing here is a new
     * record — the calendar is recomputed on every read, exactly as posture findings and backup
     * coverage are.
     *
     * The window defaults to the last 7 and next 35 days and may span at most 400. Recurring
     * sources are expanded to at most 400 occurrences each, so one nightly schedule cannot flood a
     * year-long query.
     *
     * GET /api/org/{orgId}/calendar
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive lower bound. Defaults to 7 days ago.
     * @param string|null $to Exclusive upper bound. Defaults to 35 days ahead.
     * @param string|null $kinds Comma-separated `CalendarEventKind`s. Unknown members are ignored rather than rejected; omitting the parameter returns every kind.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $kinds = null, ?RequestOptions $options = null): CalendarResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/calendar',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'kinds' => $kinds],
            ),
            $options,
        );

        return CalendarResponse::fromArray(Coerce::toArray($data));
    }
}
