<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\BudgetAlertEvent;
use Infrawrench\Sdk\Model\BudgetAlertNoteInput;
use Infrawrench\Sdk\Model\BudgetAlertNoteResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->budgets->events` */
final class BudgetsEventsNamespace extends ApiNamespace
{
    /**
     * Alert event history for a budget
     *
     * GET /api/org/{orgId}/budgets/{id}/events
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<BudgetAlertEvent>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/budgets/{id}/events',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): BudgetAlertEvent => BudgetAlertEvent::fromArray(Coerce::toArray($item)));
    }

    /**
     * Explain a fired budget alert
     *
     * Saves a note on one firing (who and when are recorded), draws it on every cost chart as an
     * org-wide annotation at the day the alert fired, and posts it after the alert: a reply in
     * each Slack message's thread and a follow-up to the Teams webhooks it reached. Sending again
     * rewrites the note and rewords the same chart marker rather than adding another; a marker
     * somebody deleted is not recreated. Alerts that fired before notes existed, or that quiet
     * hours held, have no recorded chat messages to follow. Needs `budgets:read` and
     * `costs:write`.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/budgets/{id}/events/{eventId}/note
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function note(string $id, string $eventId, BudgetAlertNoteInput $body, ?string $orgId = null, ?RequestOptions $options = null): BudgetAlertNoteResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/budgets/{id}/events/{eventId}/note',
                pathParams: ['orgId' => $orgId, 'id' => $id, 'eventId' => $eventId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return BudgetAlertNoteResult::fromArray(Coerce::toArray($data));
    }
}
