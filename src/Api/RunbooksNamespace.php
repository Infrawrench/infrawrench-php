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
use Infrawrench\Sdk\Model\Runbook;
use Infrawrench\Sdk\Model\RunbookCreate;
use Infrawrench\Sdk\Model\RunbookUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->runbooks` */
final class RunbooksNamespace extends ApiNamespace
{
    /** `$client->runbooks->get` */
    public readonly RunbooksGetNamespace $get;

    /** `$client->runbooks->runs` */
    public readonly RunbooksRunsNamespace $runs;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new RunbooksGetNamespace($this->transport);
        $this->runs = new RunbooksRunsNamespace($this->transport);
    }

    /**
     * Write a runbook
     *
     * Editing takes `org:settings:write` — a procedure is an org-wide statement about how
     * something is done, and it is read by strangers under pressure. Names are unique within an
     * organization: two runbooks called "Failover" is how the wrong one gets run.
     *
     * POST /api/org/{orgId}/runbooks
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?RunbookCreate $body = null, ?RequestOptions $options = null): Runbook
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/runbooks',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Runbook::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a runbook
     *
     * Takes its run history with it. To retire a procedure without losing the record of the runs
     * performed against it, set `enabled` to false instead.
     *
     * DELETE /api/org/{orgId}/runbooks/{runbookId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $runbookId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/runbooks/{runbookId}',
                pathParams: ['orgId' => $orgId, 'runbookId' => $runbookId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Edit a runbook
     *
     * Omitted fields are left alone. The result is validated **after** merging, so a patch that
     * only changes the steps still has to produce a runbook that is valid as a whole. A step sent
     * with its `id` keeps its identity, so a run in progress still matches it.
     *
     * PATCH /api/org/{orgId}/runbooks/{runbookId}
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
    public function update(string $runbookId, ?string $orgId = null, ?RunbookUpdate $body = null, ?RequestOptions $options = null): Runbook
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/runbooks/{runbookId}',
                pathParams: ['orgId' => $orgId, 'runbookId' => $runbookId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Runbook::fromArray(Coerce::toArray($data));
    }
}
