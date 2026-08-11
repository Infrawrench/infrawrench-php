<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SessionRecording;
use Infrawrench\Sdk\RequestOptions;

/** `$client->sessionRecordings` */
final class SessionRecordingsNamespace extends ApiNamespace
{
    /** `$client->sessionRecordings->settings` */
    public readonly SessionRecordingsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new SessionRecordingsSettingsNamespace($this->transport);
    }

    /**
     * Download a recording as an asciicast
     *
     * The session as an [asciicast v2](https://docs.asciinema.org/manual/asciicast/v2/) document:
     * a JSON header line followed by one `[time, code, data]` event per line. Deliberately
     * somebody else's format — the same bytes play in `asciinema play` and in the reference web
     * player, so a recording is useful to an auditor who has never seen this product.
     * `?download=1` returns it as an attachment. **Every fetch is audit-logged**, including this
     * one: an investigator has to be able to answer who has watched a given tape.
     *
     * _Requires permission: `session-recordings:read`._
     *
     * GET /api/org/{orgId}/session-recordings/{recordingId}/cast
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param '1'|null $download Force an attachment disposition.
     * @return string Raw response bytes.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function cast(string $recordingId, ?string $orgId = null, ?string $download = null, ?RequestOptions $options = null): string
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/session-recordings/{recordingId}/cast',
                pathParams: ['orgId' => $orgId, 'recordingId' => $recordingId],
                query: ['download' => $download],
                accept: 'binary',
            ),
            $options,
        );

        return Coerce::toString($data);
    }

    /**
     * Delete a recording
     *
     * Removes the recording and its stored chunks. Audit-logged.
     *
     * _Requires permission: `session-recordings:write`._
     *
     * DELETE /api/org/{orgId}/session-recordings/{recordingId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $recordingId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/session-recordings/{recordingId}',
                pathParams: ['orgId' => $orgId, 'recordingId' => $recordingId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one recording's metadata
     *
     * _Requires permission: `session-recordings:read`._
     *
     * GET /api/org/{orgId}/session-recordings/{recordingId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $recordingId, ?string $orgId = null, ?RequestOptions $options = null): SessionRecording
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/session-recordings/{recordingId}',
                pathParams: ['orgId' => $orgId, 'recordingId' => $recordingId],
            ),
            $options,
        );

        return SessionRecording::fromArray(Coerce::toArray($data));
    }

    /**
     * List recorded SSH sessions
     *
     * Recorded sessions, newest first. Only SSH opened through the cloud is recorded — those
     * sessions are already proxied by the server, so recording tees a stream it holds rather than
     * requiring an agent on the host. A desktop session that dials a host directly never reaches
     * the server and cannot appear here.
     *
     * _Requires permission: `session-recordings:read`._
     *
     * GET /api/org/{orgId}/session-recordings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'recording'|'complete'|'truncated'|'abandoned'|null $status `recording` (live), `complete` (closed cleanly), `truncated` (hit the per-session capture ceiling — the tape is a genuine partial and says so), or `abandoned` (the server handling the session went away before it could close the row).
     * @param string|null $since Inclusive lower bound on `startedAt`.
     * @param string|null $until Exclusive upper bound on `startedAt`.
     * @return list<SessionRecording>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $status = null, ?string $userId = null, ?string $resourceId = null, ?string $accountId = null, ?string $since = null, ?string $until = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/session-recordings',
                pathParams: ['orgId' => $orgId],
                query: ['status' => $status, 'userId' => $userId, 'resourceId' => $resourceId, 'accountId' => $accountId, 'since' => $since, 'until' => $until, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): SessionRecording => SessionRecording::fromArray(Coerce::toArray($item)));
    }
}
