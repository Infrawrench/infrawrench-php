<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->ping` */
final class PingNamespace extends ApiNamespace
{
    /** `$client->ping->fail` */
    public readonly PingFailNamespace $fail;

    /** `$client->ping->start` */
    public readonly PingStartNamespace $start;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->fail = new PingFailNamespace($this->transport);
        $this->start = new PingStartNamespace($this->transport);
    }

    /**
     * Ping a heartbeat
     *
     * **Unauthenticated**: the token in the path is the credential. The job ran: the heartbeat is
     * up and its next deadline is set from the schedule. Answers `OK` in plain text; an unknown
     * token answers 404, and more than 20 pings a minute for one heartbeat answer 429 without
     * being recorded. A POST body's first 1000 characters are kept with the ping.
     *
     * POST /api/ping/{token}
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
                path: '/api/ping/{token}',
                pathParams: ['token' => $token],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Ping a heartbeat (GET)
     *
     * **Unauthenticated**: the token in the path is the credential. The job ran: the heartbeat is
     * up and its next deadline is set from the schedule. Answers `OK` in plain text; an unknown
     * token answers 404, and more than 20 pings a minute for one heartbeat answer 429 without
     * being recorded. A POST body's first 1000 characters are kept with the ping.
     *
     * GET /api/ping/{token}
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
                path: '/api/ping/{token}',
                pathParams: ['token' => $token],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }
}
