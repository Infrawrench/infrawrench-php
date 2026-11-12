<?php

/*
 * infrawrench/sdk v1.105.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.105.0).
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
use Infrawrench\Sdk\Model\Workflow;
use Infrawrench\Sdk\Model\WorkflowCheckInput;
use Infrawrench\Sdk\Model\WorkflowInput;
use Infrawrench\Sdk\Model\WorkflowMetric;
use Infrawrench\Sdk\Model\WorkflowRun;
use Infrawrench\Sdk\Model\WorkflowRunOutcome;
use Infrawrench\Sdk\Model\WorkflowTypecheckResult;
use Infrawrench\Sdk\Model\WorkflowTypingsResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->workflows` */
final class WorkflowsNamespace extends ApiNamespace
{
    /** `$client->workflows->schedule` */
    public readonly WorkflowsScheduleNamespace $schedule;

    /** `$client->workflows->secrets` */
    public readonly WorkflowsSecretsNamespace $secrets;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->schedule = new WorkflowsScheduleNamespace($this->transport);
        $this->secrets = new WorkflowsSecretsNamespace($this->transport);
    }

    /**
     * Type-check workflow source
     *
     * Checks `source` (or the stored source) against the workflow's generated typings, the same
     * check the editor runs. Needs `secrets:read` as well, since the typings name the assigned
     * secrets.
     *
     * _Requires permission: `workflows:read`._
     *
     * POST /api/org/{orgId}/workflows/{id}/check
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function check(string $id, WorkflowCheckInput $body, ?string $orgId = null, ?RequestOptions $options = null): WorkflowTypecheckResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflows/{id}/check',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return WorkflowTypecheckResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Create a workflow
     *
     * Every field is optional: an empty body creates an enabled, manually triggered workflow with
     * no source. Assigning secrets (`secretIds`) also needs `secrets:read`.
     *
     * _Requires permission: `workflows:write`._
     *
     * POST /api/org/{orgId}/workflows
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(WorkflowInput $body, ?string $orgId = null, ?RequestOptions $options = null): Workflow
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflows',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Workflow::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a workflow
     *
     * _Requires permission: `workflows:write`._
     *
     * DELETE /api/org/{orgId}/workflows/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/workflows/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a workflow
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): Workflow
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Workflow::fromArray(Coerce::toArray($data));
    }

    /**
     * List workflows
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<Workflow>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): Workflow => Workflow::fromArray(Coerce::toArray($item)));
    }

    /**
     * A workflow's metric values
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/metrics
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<WorkflowMetric>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function metrics(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}/metrics',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): WorkflowMetric => WorkflowMetric::fromArray(Coerce::toArray($item)));
    }

    /**
     * Run a workflow now
     *
     * Runs the workflow to completion with the caller's permissions and answers its outcome.
     * Non-interactive: an `infra.prompt` gets no answer.
     *
     * _Requires permission: `workflows:write`._
     *
     * POST /api/org/{orgId}/workflows/{id}/run
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function run(string $id, ?string $orgId = null, ?RequestOptions $options = null): WorkflowRunOutcome
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/workflows/{id}/run',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return WorkflowRunOutcome::fromArray(Coerce::toArray($data));
    }

    /**
     * A workflow's recent runs
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/runs
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<WorkflowRun>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function runs(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}/runs',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): WorkflowRun => WorkflowRun::fromArray(Coerce::toArray($item)));
    }

    /**
     * Generated infra.d.ts for a workflow
     *
     * The ambient TypeScript declarations workflow source is written against, specialized with
     * this organization's connected accounts, resource types, SSH key names, and the workflow's
     * trigger + metrics. Default is the fast static surface (`create` fields are `Record<string,
     * string>`). Pass `enrich=1` for a second pass that hits provider APIs for precise create()
     * field unions and live sidecar capability flags; the editor loads static first and upgrades
     * when that finishes.
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/typings
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param '1'|'true'|null $enrich When `1` or `true`, enrich create() field shapes and sidecar capabilities from live provider configs. Omit for the fast static surface.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function typings(string $id, ?string $orgId = null, ?string $enrich = null, ?RequestOptions $options = null): WorkflowTypingsResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/workflows/{id}/typings',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['enrich' => $enrich],
            ),
            $options,
        );

        return WorkflowTypingsResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a workflow
     *
     * An omitted field keeps its stored value. Changing the source, trigger or assigned secrets
     * makes automated runs act with the caller's permissions from then on; when the workflow has
     * secrets assigned, any edit also needs `secrets:read`.
     *
     * _Requires permission: `workflows:write`._
     *
     * PUT /api/org/{orgId}/workflows/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string $id Workflow id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, WorkflowInput $body, ?string $orgId = null, ?RequestOptions $options = null): Workflow
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/workflows/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Workflow::fromArray(Coerce::toArray($data));
    }
}
