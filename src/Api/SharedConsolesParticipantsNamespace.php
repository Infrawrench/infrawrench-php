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
use Infrawrench\Sdk\Model\SharedConsoleState;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sharedConsoles->participants` */
final class SharedConsolesParticipantsNamespace extends ApiNamespace
{
    /**
     * Remove somebody from a shared console
     *
     * Their socket is closed immediately on the replica holding the pty, and within one two-second
     * sweep on any other. They are marked `removed` rather than `left`, so they cannot resume
     * without a fresh invite. The sharer cannot be removed — revoke the share.
     *
     * DELETE /api/org/{orgId}/shared-consoles/{consoleId}/participants/{participantId}
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
    public function delete(string $consoleId, string $participantId, ?string $orgId = null, ?RequestOptions $options = null): SharedConsoleState
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/shared-consoles/{consoleId}/participants/{participantId}',
                pathParams: ['orgId' => $orgId, 'consoleId' => $consoleId, 'participantId' => $participantId],
            ),
            $options,
        );

        return SharedConsoleState::fromArray(Coerce::toArray($data));
    }
}
