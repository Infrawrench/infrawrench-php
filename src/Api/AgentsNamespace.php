<?php

/*
 * infrawrench/sdk v0.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.15.0).
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
use Infrawrench\Sdk\Model\AgentVmAccount;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agents` */
final class AgentsNamespace extends ApiNamespace
{
    /** `$client->agents->sessions` */
    public readonly AgentsSessionsNamespace $sessions;

    /** `$client->agents->settings` */
    public readonly AgentsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->sessions = new AgentsSessionsNamespace($this->transport);
        $this->settings = new AgentsSettingsNamespace($this->transport);
    }

    /**
     * List accounts whose plugins can create agent VMs
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/agents/accounts
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AgentVmAccount>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function accounts(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/agents/accounts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AgentVmAccount => AgentVmAccount::fromArray(Coerce::toArray($item)));
    }
}
