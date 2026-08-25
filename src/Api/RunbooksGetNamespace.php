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
use Infrawrench\Sdk\Model\Runbook;
use Infrawrench\Sdk\Model\RunbookList;
use Infrawrench\Sdk\RequestOptions;

/** `$client->runbooks->get` */
final class RunbooksGetNamespace extends ApiNamespace
{
    /**
     * List the organization's runbooks
     *
     * Every runbook, with how many times each has been run and when it was last used. Reading
     * takes `resources:read`: the person who can see the infrastructure is the person who will be
     * woken up about it.
     *
     * GET /api/org/{orgId}/runbooks
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): RunbookList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/runbooks',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return RunbookList::fromArray(Coerce::toArray($data));
    }

    /**
     * Get one runbook
     *
     * GET /api/org/{orgId}/runbooks/{runbookId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdRunbooksRunbookId(string $runbookId, ?string $orgId = null, ?RequestOptions $options = null): Runbook
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/runbooks/{runbookId}',
                pathParams: ['orgId' => $orgId, 'runbookId' => $runbookId],
            ),
            $options,
        );

        return Runbook::fromArray(Coerce::toArray($data));
    }
}
