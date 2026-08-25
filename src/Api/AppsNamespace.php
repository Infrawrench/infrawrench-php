<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
use Infrawrench\Sdk\Model\LinuxAppHostCheck;
use Infrawrench\Sdk\Model\LinuxAppHostTarget;
use Infrawrench\Sdk\Model\LinuxAppSetupEvent;
use Infrawrench\Sdk\Model\LinuxAppSetupRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->apps` */
final class AppsNamespace extends ApiNamespace
{
    /**
     * Check whether a host can run Linux applications
     *
     * Runs a read-only shell probe over SSH and reports what the host is missing, plus the
     * packages and commands that would fix it. A POST because it opens a connection to the named
     * host and must never be cached — its whole value is saying what the host is now.
     *
     * POST /api/org/{orgId}/apps/check
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: The host key is new or has changed; trust it and retry
     *
     * Raises on 502: The host could not be reached or probed
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function check(LinuxAppHostTarget $body, ?string $orgId = null, ?RequestOptions $options = null): LinuxAppHostCheck
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/apps/check',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return LinuxAppHostCheck::fromArray(Coerce::toArray($data));
    }

    /**
     * Install what a host needs to run Linux applications
     *
     * Installs the named requirements using the host's own package manager, then re-probes and
     * reports what the host now is. Takes requirement ids, never commands — the commands are
     * derived server-side from a fresh probe. Needs root or passwordless sudo on the host,
     * respects change freezes, and is audited as `linux_app.host_setup`.
     *
     * Responds with `application/x-ndjson`: one `{"line":"…"}` per line of package-manager output,
     * then a final `{"outcome":{…}}`. A failure arrives as `{"error":"…"}` inside the stream,
     * because the status line has already been sent by then.
     *
     * POST /api/org/{orgId}/apps/setup
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A change freeze is in effect, or the host key needs trusting
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function setup(LinuxAppSetupRequest $body, ?string $orgId = null, ?RequestOptions $options = null): LinuxAppSetupEvent
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/apps/setup',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return LinuxAppSetupEvent::fromArray(Coerce::toArray($data));
    }
}
