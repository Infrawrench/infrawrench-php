<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\UserSession;
use Infrawrench\Sdk\RequestOptions;

/** `$client->profile->sessions` */
final class ProfileSessionsNamespace extends ApiNamespace
{
    /**
     * Revoke one session
     *
     * Refuses the session making the request — use sign-out for that.
     *
     * DELETE /api/profile/sessions/{sessionId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 404: Not found
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $sessionId, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/profile/sessions/{sessionId}',
                pathParams: ['sessionId' => $sessionId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List the signed-in user's active sessions
     *
     * GET /api/profile/sessions
     *
     * Raises on 401: Unauthenticated
     *
     * @return list<UserSession>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/profile/sessions',
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): UserSession => UserSession::fromArray(Coerce::toArray($item)));
    }

    /**
     * Revoke every session except the current one
     *
     * POST /api/profile/sessions/revoke-others
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * @return array{revoked: int}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function revokeOthers(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/sessions/revoke-others',
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
