<?php

/*
 * infrawrench/sdk v0.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.14.0).
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
use Infrawrench\Sdk\Model\AgentSettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->agents->settings` */
final class AgentsSettingsNamespace extends ApiNamespace
{
    /**
     * Get saved Agents defaults
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/agents/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ?AgentSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/agents/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): AgentSettings => AgentSettings::fromArray(Coerce::toArray($value)));
    }

    /**
     * Save Agents defaults
     *
     * _Requires permission: `accounts:write`._
     *
     * PUT /api/org/{orgId}/agents/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?AgentSettings $body, ?string $orgId = null, ?RequestOptions $options = null): ?AgentSettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/agents/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): AgentSettings => AgentSettings::fromArray(Coerce::toArray($value)));
    }
}
