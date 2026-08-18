<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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
use Infrawrench\Sdk\Model\SharedConsoleCreated;
use Infrawrench\Sdk\Model\SharedConsoleInvitePreview;
use Infrawrench\Sdk\Model\SharedConsoleState;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sharedConsoles->invites` */
final class SharedConsolesInvitesNamespace extends ApiNamespace
{
    /**
     * Mint a replacement invite
     *
     * An invite is spent by the first person it admits, so inviting a second guest means minting a
     * second link. Replaces any outstanding one. Sharer or `org:settings:write`.
     *
     * POST /api/org/{orgId}/shared-consoles/{consoleId}/invites
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{inviteTtlMinutes?: int}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $consoleId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): SharedConsoleCreated
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/invites',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return SharedConsoleCreated::fromArray(Coerce::toArray($data));
    }

    /**
     * Withdraw the outstanding invite
     *
     * Kills the link without touching the session or anyone already on it.
     *
     * DELETE /api/org/{orgId}/shared-consoles/{consoleId}/invites
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $consoleId, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/invites',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId],
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview what an invite link points at
     *
     * What the join screen shows before anyone commits: which host, whose session, and whether you
     * may join it. Reachable with a valid token by a signed-in member who already holds
     * `resources:execute` — the token says *which* session, never *whether*. Returns nothing from
     * the session itself.
     *
     * _Requires permission: `resources:execute`._
     *
     * GET /api/org/{orgId}/shared-consoles/invites/{token}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $token, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleInvitePreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/shared-consoles/invites/{token}',
                pathParams: ['orgId' => $orgId, 'token' => $token],
            ),
            $options,
        );

        return SharedConsoleInvitePreview::fromArray(Coerce::toArray($data));
    }
}
