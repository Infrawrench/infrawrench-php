<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
use Infrawrench\Sdk\Model\AuthFactor;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\TotpEnrollment;
use Infrawrench\Sdk\RequestOptions;

/** `$client->profile->mfa` */
final class ProfileMfaNamespace extends ApiNamespace
{
    /**
     * Issue a fresh challenge for a factor
     *
     * POST /api/profile/mfa/{factorId}/challenge
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 404: Not found
     *
     * @return array{challengeId: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function challenge(string $factorId, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/mfa/{factorId}/challenge',
                pathParams: ['factorId' => $factorId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Begin TOTP enrolment
     *
     * Creates the factor and a first challenge. The factor only becomes usable once a code is
     * verified; abandon the flow by DELETEing the returned `factorId`.
     *
     * POST /api/profile/mfa
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?RequestOptions $options = null): TotpEnrollment
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/mfa',
            ),
            $options,
        );

        return TotpEnrollment::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove an authentication factor
     *
     * DELETE /api/profile/mfa/{factorId}
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * Raises on 404: Not found
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $factorId, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/profile/mfa/{factorId}',
                pathParams: ['factorId' => $factorId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List enrolled authentication factors
     *
     * Includes factors whose enrolment was never confirmed — WorkOS does not expose a verified
     * flag.
     *
     * GET /api/profile/mfa
     *
     * Raises on 401: Unauthenticated
     *
     * @return list<AuthFactor>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/profile/mfa',
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AuthFactor => AuthFactor::fromArray(Coerce::toArray($item)));
    }

    /**
     * Verify a code against a challenge
     *
     * POST /api/profile/mfa/{factorId}/verify
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 404: Not found
     *
     * @param array{challengeId: string, code: string}|null $body
     * @return array{verified: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function verify(string $factorId, ?array $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/mfa/{factorId}/verify',
                pathParams: ['factorId' => $factorId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
