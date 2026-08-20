<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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
use Infrawrench\Sdk\Model\RunbookRun;
use Infrawrench\Sdk\Model\RunbookRunClose;
use Infrawrench\Sdk\Model\RunbookRunList;
use Infrawrench\Sdk\Model\RunbookRunStart;
use Infrawrench\Sdk\RequestOptions;

/** `$client->runbooks->runs` */
final class RunbooksRunsNamespace extends ApiNamespace
{
    /** `$client->runbooks->runs->steps` */
    public readonly RunbooksRunsStepsNamespace $steps;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->steps = new RunbooksRunsStepsNamespace($this->transport);
    }

    /**
     * Close a run out
     *
     * Closing does **not** settle outstanding steps. A run completed with three steps still
     * pending is a true and useful record — it says the incident ended before the checklist did —
     * and quietly marking them done would erase the one thing a postmortem wants to know.
     *
     * POST /api/org/{orgId}/runbooks/runs/{runId}/close
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function close(string $runId, ?string $orgId = null, ?RunbookRunClose $body = null, ?RequestOptions $options = null): RunbookRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/runbooks/runs/{runId}/close',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return RunbookRun::fromArray(Coerce::toArray($data));
    }

    /**
     * Start performing a runbook
     *
     * Copies every step's title and kind into the run, so the record of what somebody was asked to
     * do survives the runbook being rewritten next week.
     *
     * Takes `resources:read`, like ticking a step: performing a checklist is not an act of
     * configuration, and requiring an admin mid-incident is how a team stops using it.
     * Deliberately not deduplicated against a run already in progress — performing the failover
     * twice in one incident is a real thing, and refusing the second would mean it goes unrecorded
     * rather than not happening.
     *
     * POST /api/org/{orgId}/runbooks/{runbookId}/runs
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $runbookId, ?string $orgId = null, ?RunbookRunStart $body = null, ?RequestOptions $options = null): RunbookRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/runbooks/{runbookId}/runs',
                pathParams: ['orgId' => $orgId, 'runbookId' => $runbookId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return RunbookRun::fromArray(Coerce::toArray($data));
    }

    /**
     * List runbook runs
     *
     * Newest first, optionally narrowed to one runbook or one incident.
     *
     * GET /api/org/{orgId}/runbooks/runs
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $runbookId = null, ?string $incidentId = null, ?int $limit = null, ?RequestOptions $options = null): RunbookRunList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/runbooks/runs',
                pathParams: ['orgId' => $orgId],
                query: ['runbookId' => $runbookId, 'incidentId' => $incidentId, 'limit' => $limit],
            ),
            $options,
        );

        return RunbookRunList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one runbook run
     *
     * GET /api/org/{orgId}/runbooks/runs/{runId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdRunbooksRunsRunId(string $runId, ?string $orgId = null, ?RequestOptions $options = null): RunbookRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/runbooks/runs/{runId}',
                pathParams: ['orgId' => $orgId, 'runId' => $runId],
            ),
            $options,
        );

        return RunbookRun::fromArray(Coerce::toArray($data));
    }
}
