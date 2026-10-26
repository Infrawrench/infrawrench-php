<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
use Infrawrench\Sdk\Model\AgentLinkInfo;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agentLink` */
final class AgentLinkNamespace extends ApiNamespace
{
    /** `$client->agentLink->agents` */
    public readonly AgentLinkAgentsNamespace $agents;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->agents = new AgentLinkAgentsNamespace($this->transport);
    }

    /**
     * Unlink, revoking every agent this link made
     *
     * DELETE /api/agent-link
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/agent-link',
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Describe this link
     *
     * GET /api/agent-link
     *
     * Raises on 401: Unknown or revoked link credential
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?RequestOptions $options = null): AgentLinkInfo
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/agent-link',
            ),
            $options,
        );

        return AgentLinkInfo::fromArray(Coerce::toArray($data));
    }
}
