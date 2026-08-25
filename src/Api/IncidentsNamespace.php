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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\Incident;
use Infrawrench\Sdk\Model\IncidentDeclare;
use Infrawrench\Sdk\Model\IncidentPatch;
use Infrawrench\Sdk\Model\IncidentPostmortem;
use Infrawrench\Sdk\Model\IncidentTimeline;
use Infrawrench\Sdk\RequestOptions;

/** `$client->incidents` */
final class IncidentsNamespace extends ApiNamespace
{
    /** `$client->incidents->get` */
    public readonly IncidentsGetNamespace $get;

    /** `$client->incidents->notes` */
    public readonly IncidentsNotesNamespace $notes;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new IncidentsGetNamespace($this->transport);
        $this->notes = new IncidentsNotesNamespace($this->transport);
    }

    /**
     * Declare an incident
     *
     * Record the incident and perform the opted-in side effects. The incident row is written first
     * and alone: a 201 means it exists, and the `artifacts` array on the response says what else
     * happened. No side effect can lose the declaration, and none is swallowed. Audit-logged.
     *
     * _Requires permission: `incidents:write`._
     *
     * POST /api/org/{orgId}/incidents
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?IncidentDeclare $body = null, ?RequestOptions $options = null): Incident
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/incidents',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Incident::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an incident
     *
     * Removes the incident, its notes and its artefact records. It does not lift a freeze or close
     * a status-page update — resolve for that; deleting is for a mis-declaration. Audit-logged.
     *
     * _Requires permission: `incidents:write`._
     *
     * DELETE /api/org/{orgId}/incidents/{incidentId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $incidentId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/incidents/{incidentId}',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Export a pre-filled postmortem
     *
     * Markdown with the timeline, the affected resources, the duration, the time to mitigate and
     * the notes already filled in. The analysis headings — impact, root cause, action items — are
     * deliberately left blank: a generated document that guesses at a root cause is worse than one
     * that leaves a heading.
     *
     * _Requires permission: `incidents:read`._
     *
     * GET /api/org/{orgId}/incidents/{incidentId}/postmortem
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function postmortem(string $incidentId, ?string $orgId = null, ?RequestOptions $options = null): IncidentPostmortem
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/incidents/{incidentId}/postmortem',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
            ),
            $options,
        );

        return IncidentPostmortem::fromArray(Coerce::toArray($data));
    }

    /**
     * Retry the artefacts that failed
     *
     * Re-runs only the side effects whose artefact is in a failure state, replacing each failure
     * rather than queueing a second attempt beside it. A `failed` artefact is **re-created**; a
     * `close_failed` one is **re-closed** — re-creating the latter would open a second change
     * freeze or post a duplicate public notice. A status-page retry reuses the components recorded
     * on the artefact's `request`, so the announcement keeps its original scope. Its own endpoint
     * rather than a flag on PATCH, because it writes into three external systems. Audit-logged.
     *
     * _Requires permission: `incidents:write`._
     *
     * POST /api/org/{orgId}/incidents/{incidentId}/retry-artifacts
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function retryArtifacts(string $incidentId, ?string $orgId = null, ?RequestOptions $options = null): Incident
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/incidents/{incidentId}/retry-artifacts',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
            ),
            $options,
        );

        return Incident::fromArray(Coerce::toArray($data));
    }

    /**
     * Assemble the incident's timeline
     *
     * Merged on read from what is already recorded between the incident's start and its
     * resolution: resource changes, deployments, cost anomalies, provider status incidents, audit
     * entries, change freezes and workflow runs (all via the same union the Moment screen uses),
     * plus probe state transitions, metric-alert firings, the incident's own life events, its
     * artefacts and its operator notes. Nothing is copied — a correction upstream shows up here on
     * the next read.
     *
     * Probe transitions are an approximation: `synthetic_probes` keeps only a single
     * `lastStateChangeAt`, so a probe that flapped twice inside the window contributes its most
     * recent flip and no more.
     *
     * _Requires permission: `incidents:read`._
     *
     * GET /api/org/{orgId}/incidents/{incidentId}/timeline
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function timeline(string $incidentId, ?string $orgId = null, ?RequestOptions $options = null): IncidentTimeline
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/incidents/{incidentId}/timeline',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
            ),
            $options,
        );

        return IncidentTimeline::fromArray(Coerce::toArray($data));
    }

    /**
     * Edit or transition an incident
     *
     * Omitted fields keep their value. Setting `status` stamps the matching timestamp, and
     * resolving undoes exactly what this incident created — the freeze whose id is on its own
     * artefact, not whatever freeze happens to be in effect. Resolving an incident that was never
     * marked mitigated back-fills `mitigatedAt` from `resolvedAt`. Audit-logged.
     *
     * _Requires permission: `incidents:write`._
     *
     * PATCH /api/org/{orgId}/incidents/{incidentId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $incidentId, ?string $orgId = null, ?IncidentPatch $body = null, ?RequestOptions $options = null): Incident
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/incidents/{incidentId}',
                pathParams: ['orgId' => $orgId, 'incidentId' => $incidentId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Incident::fromArray(Coerce::toArray($data));
    }
}
