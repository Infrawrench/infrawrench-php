<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

/** `$client->ping->start` */
final class PingStartNamespace extends ApiNamespace
{
    /**
     * Signal a run started
     *
     * **Unauthenticated**: the token in the path is the credential. Records the start so the
     * closing ping can report the run's duration. Answers `OK` in plain text; an unknown token
     * answers 404, and more than 20 pings a minute for one heartbeat answer 429 without being
     * recorded. A POST body's first 1000 characters are kept with the ping.
     *
     * POST /api/ping/{token}/start
     *
     * Raises on 404: Not found
     *
     * Raises on 429: Error
     *
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $token, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/ping/{token}/start',
                pathParams: ['token' => $token],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Signal a run started (GET)
     *
     * **Unauthenticated**: the token in the path is the credential. Records the start so the
     * closing ping can report the run's duration. Answers `OK` in plain text; an unknown token
     * answers 404, and more than 20 pings a minute for one heartbeat answer 429 without being
     * recorded. A POST body's first 1000 characters are kept with the ping.
     *
     * GET /api/ping/{token}/start
     *
     * Raises on 404: Not found
     *
     * Raises on 429: Error
     *
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $token, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/ping/{token}/start',
                pathParams: ['token' => $token],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
