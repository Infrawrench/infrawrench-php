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
use Infrawrench\Sdk\Internal\Transport;
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
     * Generated infra.d.ts for a workflow
     *
     * The ambient TypeScript declarations workflow source is written against, specialized with
     * this organization's connected accounts, resource types, SSH key names, and the workflow's
     * trigger + metrics. Default is the fast static surface (`create` fields are `Record<string,
     * string>`). Pass `enrich=1` for a second pass that hits provider APIs for precise create()
     * field unions and live sidecar capability flags — the editor loads static first and upgrades
     * when that finishes.
     *
     * _Requires permission: `workflows:read`._
     *
     * GET /api/org/{orgId}/workflows/{id}/typings
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
}
