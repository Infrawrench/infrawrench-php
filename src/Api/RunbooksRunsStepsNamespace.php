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
use Infrawrench\Sdk\Model\RunbookRun;
use Infrawrench\Sdk\Model\RunbookStepUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->runbooks->runs->steps` */
final class RunbooksRunsStepsNamespace extends ApiNamespace
{
    /**
     * Tick a step
     *
     * One targeted update on one row, so two responders working the same incident can tick
     * different steps at the same moment without either losing the other's work.
     *
     * A closed run refuses updates, and reopening is not offered: a run is a record of what
     * happened. Start another run to record another attempt.
     *
     * PATCH /api/org/{orgId}/runbooks/runs/{runId}/steps/{stepId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $runId, string $stepId, ?string $orgId = null, ?RunbookStepUpdate $body = null, ?RequestOptions $options = null): RunbookRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/runbooks/runs/{runId}/steps/{stepId}',
                pathParams: ['orgId' => $orgId, 'runId' => $runId, 'stepId' => $stepId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return RunbookRun::fromArray(Coerce::toArray($data));
    }
}
