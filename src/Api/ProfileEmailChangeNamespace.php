<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->profile->emailChange` */
final class ProfileEmailChangeNamespace extends ApiNamespace
{
    /**
     * Redeem an email change code
     *
     * On success the account's email is the new address and it is marked verified.
     *
     * POST /api/profile/email-change/confirm
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * @param array{code: string}|null $body
     * @return array{email: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function confirm(?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/email-change/confirm',
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Send a confirmation code to a new email address
     *
     * Starts an email change. The code goes to the new address and the account keeps its current
     * address until `/api/profile/email-change/confirm` redeems it, so an abandoned or mistyped
     * change is harmless.
     *
     * POST /api/profile/email-change
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * @param array{newEmail: string}|null $body
     * @return array{newEmail: string, expiresAt: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/email-change',
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
