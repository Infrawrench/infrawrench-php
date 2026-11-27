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
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Model\LiveTicketRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->live` */
final class LiveNamespace extends ApiNamespace
{
    /**
     * Get a live-update ticket
     *
     * A ticket for watching one topic: either `poll` (no push channel on this server) or a sealed
     * Neon Realtime query scoped to the organization. Each topic needs the read permission of the
     * list it signals; a ticket expires after about a minute and is renewed by asking again, which
     * checks the permission again.
     *
     * POST /api/org/{orgId}/live/tickets
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{driver: 'poll'}|array{driver: 'neon', url: string, query: array<string, mixed>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function tickets(LiveTicketRequest $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/live/tickets',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return $data;
    }
}
