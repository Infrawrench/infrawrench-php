<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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
use Infrawrench\Sdk\Model\AgentT3PolicyApplyRequest;
use Infrawrench\Sdk\Model\AgentT3PolicyApplyResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agents->t3Policy` */
final class AgentsT3PolicyNamespace extends ApiNamespace
{
    /**
     * Roll the T3 Code policy out to existing servers
     *
     * Installs the organization's current T3 Code managed policy (or removes the one Infrawrench
     * installed, when there is none) on existing T3 Code servers. T3 Code reads its policy only at
     * startup: `restart: true` restarts it so the policy applies now, interrupting running agent
     * turns, terminals and connected clients; `restart: false` installs the file and marks the
     * session `t3PolicyRestartPending`. Servers that already have the policy, that the policy does
     * not fit, or that are still setting up are not dialled. Requires `resources:execute`.
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/agents/t3-policy/apply
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function apply(AgentT3PolicyApplyRequest $body, ?string $orgId = null, ?RequestOptions $options = null): AgentT3PolicyApplyResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/agents/t3-policy/apply',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AgentT3PolicyApplyResult::fromArray(Coerce::toArray($data));
    }
}
