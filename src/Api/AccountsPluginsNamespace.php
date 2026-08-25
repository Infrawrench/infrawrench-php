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
use Infrawrench\Sdk\Model\PluginId;
use Infrawrench\Sdk\Model\PluginSummary;
use Infrawrench\Sdk\Model\PolicyTemplateResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accounts->plugins` */
final class AccountsPluginsNamespace extends ApiNamespace
{
    /**
     * List installed plugins and their credential fields
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/accounts/plugins
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<PluginSummary>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/plugins',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): PluginSummary => PluginSummary::fromArray(Coerce::toArray($item)));
    }

    /**
     * Generate a least-privilege credential template for a plugin
     *
     * Returns the paste-ready credential document (IAM policy JSON, custom role YAML, token
     * template…) scoped to the requested capability ids. Omitting `capabilities` (or sending it
     * empty) selects every declared capability; any unknown capability id is rejected with 400.
     * 400 also for plugins that don't provide a template.
     *
     * _Requires permission: `accounts:read`._
     *
     * GET /api/org/{orgId}/accounts/plugins/{pluginId}/policy-template
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $capabilities Comma-separated capability ids, e.g. `resources,costs`.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function policyTemplate(string $pluginId, ?string $orgId = null, ?string $capabilities = null, ?RequestOptions $options = null): PolicyTemplateResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/accounts/plugins/{pluginId}/policy-template',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId],
                query: ['capabilities' => $capabilities],
            ),
            $options,
        );

        return PolicyTemplateResponse::fromArray(Coerce::toArray($data));
    }
}
