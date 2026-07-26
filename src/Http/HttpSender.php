<?php

/*
 * infrawrench/sdk v0.1.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.1.1).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Http;

/**
 * The one place the SDK touches the network.
 *
 * Everything above this — path interpolation, query serialization, multipart
 * encoding, JSON decoding, error mapping — happens before a sender is called
 * and after it returns, so implementing this interface is enough to route the
 * whole client through a proxy, a PSR-18 client, a recorded fixture, or a test
 * double that only asserts on the request. Pass one as `sender:` when
 * constructing `APIV1Client`.
 *
 * By taking the body as an already-encoded string rather than a structure, the
 * interface stays free of any opinion about JSON or multipart, and an
 * implementation cannot accidentally re-encode a request.
 */
interface HttpSender
{
    /**
     * @param array<string, string> $headers Lowercased header names.
     * @param string|null           $body    Encoded request body, or `null` for none.
     * @param float|null            $timeout Seconds; `null` means no limit.
     *
     * @throws \Infrawrench\Sdk\TransportException if no response could be obtained.
     */
    public function send(
        string $method,
        string $url,
        array $headers,
        ?string $body,
        ?float $timeout,
    ): HttpResponse;
}
