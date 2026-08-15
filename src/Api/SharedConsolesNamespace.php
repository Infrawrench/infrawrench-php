<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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
use Infrawrench\Sdk\Model\CreateSharedConsole;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SharedConsoleCreated;
use Infrawrench\Sdk\Model\SharedConsoleJoined;
use Infrawrench\Sdk\Model\SharedConsoleState;
use Infrawrench\Sdk\Model\SharedConsoleSummary;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sharedConsoles` */
final class SharedConsolesNamespace extends ApiNamespace
{
    /** `$client->sharedConsoles->invites` */
    public readonly SharedConsolesInvitesNamespace $invites;

    /** `$client->sharedConsoles->participants` */
    public readonly SharedConsolesParticipantsNamespace $participants;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->invites = new SharedConsolesInvitesNamespace($this->transport);
        $this->participants = new SharedConsolesParticipantsNamespace($this->transport);
    }

    /**
     * Share a live SSH session
     *
     * Opens a share on a session you already have running and mints its first invite. You become
     * the driver.
     *
     * Returns 409 `console_not_here` when the pty is held by a different server replica than the
     * one answering this call — reopen the terminal and share again. Writing the share anyway
     * would produce a link that authorises correctly and then finds nothing to attach to.
     *
     * Requires `resources:execute` — the same permission as opening the terminal. Closed to API
     * keys: sharing a shell is an act a person performs.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/shared-consoles
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?CreateSharedConsole $body = null, ?RequestOptions $options = null): SharedConsoleCreated
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return SharedConsoleCreated::fromArray(Coerce::toArray($data));
    }

    /**
     * Revoke a share
     *
     * Disconnects every guest and stops the fan-out. The sharer's own SSH session carries on —
     * revoking a share is not killing a terminal.
     *
     * The sharer or a holder of `org:settings:write`. Deliberately does **not** require
     * `resources:execute`: ending access must never be gated on still holding the access, or an
     * owner whose role was narrowed mid-incident could not close the session they opened.
     *
     * DELETE /api/org/{orgId}/shared-consoles/{consoleId}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $consoleId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one shared console
     *
     * Visible to participants and to anyone who could revoke it (the sharer, or a holder of
     * `org:settings:write`). Others get 404 — that a named colleague has a root shell open on a
     * named production host right now is operational information.
     *
     * _Requires permission: `resources:execute`._
     *
     * GET /api/org/{orgId}/shared-consoles/{consoleId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $consoleId, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }

    /**
     * Move the keyboard to another participant
     *
     * Authorised by the **current driver** (the keyboard is theirs to give) or by the **sharer**
     * (it is their box, and asking permission from somebody who has stopped responding is not a
     * control). An observer cannot promote themselves — that is `/request-driver`.
     *
     * Two simultaneous grants cannot both win: the database's partial unique index decides the
     * order, and the loser gets 409 `driver-race-lost`.
     *
     * The pty resizes to the new driver's viewport; everyone else letterboxes.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/shared-consoles/{consoleId}/handover
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{participantId: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function handover(string $consoleId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/handover',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }

    /**
     * Redeem an invite and join
     *
     * Admission needs live org membership **and** `resources:execute` — the invite is a locator,
     * never a capability, so a leaked link admits nobody who could not have opened the shell
     * themselves.
     *
     * The invite is consumed by the first person it admits. Somebody already on the console
     * resumes their own row without a token, so a reload costs them nothing and obliges the sharer
     * to mint nothing. New joiners always start as observers whatever the link said.
     *
     * Audit-logged as `shared_console.join`, and written onto the recording's timeline as an
     * asciicast marker.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/shared-consoles/{consoleId}/join
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{token: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function join(string $consoleId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): SharedConsoleJoined
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/join',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return SharedConsoleJoined::fromArray(Coerce::toArray($data));
    }

    /**
     * Leave a shared console
     *
     * Steps you off without ending the session. Your row survives, so the same invite is not
     * needed again. Deliberately does not require `resources:execute`: giving access up must never
     * be gated on still holding it.
     *
     * POST /api/org/{orgId}/shared-consoles/{consoleId}/leave
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function leave(string $consoleId, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/leave',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }

    /**
     * List sessions currently shared
     *
     * Live shared SSH sessions in this organization, with who is on each. Only cloud SSH can be
     * shared: those sessions are already proxied by the server, so fanning the pty out to a second
     * socket is a consumer of a stream it holds. A desktop session dialling a host directly never
     * reaches the server and cannot be shared.
     *
     * _Requires permission: `resources:execute`._
     *
     * GET /api/org/{orgId}/shared-consoles
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<SharedConsoleSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/shared-consoles',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SharedConsoleSummary => SharedConsoleSummary::fromArray(Coerce::toArray($item)));
    }

    /**
     * Ask for the keyboard
     *
     * Raises a flag the driver and the sharer can see. Grants nothing on its own — that is the
     * point.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/shared-consoles/{consoleId}/request-driver
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function requestDriver(string $consoleId, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/request-driver',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }
}
