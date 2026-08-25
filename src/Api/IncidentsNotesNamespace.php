<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\IncidentNote;
use Infrawrench\Sdk\Model\IncidentNoteCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->incidents->notes` */
final class IncidentsNotesNamespace extends ApiNamespace
{
    /**
     * Add an operator note
     *
     * The running commentary no join can reconstruct. `occurredAt` may be backdated so a note
     * typed at 04:00 lands on the timeline where it belongs.
     *
     * _Requires permission: `incidents:write`._
     *
     * POST /api/org/{orgId}/incidents/{incidentId}/notes
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $incidentId, ?string $orgId = null, ?IncidentNoteCreate $body = null, ?RequestOptions $options = null): IncidentNote
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/incidents/{incidentId}/notes',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return IncidentNote::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an operator note
     *
     * _Requires permission: `incidents:write`._
     *
     * DELETE /api/org/{orgId}/incidents/{incidentId}/notes/{noteId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $incidentId, string $noteId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/incidents/{incidentId}/notes/{noteId}',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId, 'noteId' => $noteId],
                accept: 'empty',
            ),
            $options,
        );
    }
}
