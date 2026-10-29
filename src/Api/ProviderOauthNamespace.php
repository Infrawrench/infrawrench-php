<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
use Infrawrench\Sdk\Model\ProviderOauthAuthorizeRequest;
use Infrawrench\Sdk\Model\ProviderOauthAuthorizeResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->providerOauth` */
final class ProviderOauthNamespace extends ApiNamespace
{
    /**
     * Start connecting a provider account with OAuth
     *
     * Returns the provider's consent URL for a plugin whose listing carries `oauth`. After consent
     * the provider redirects to `/api/provider-oauth/{pluginId}/callback`, which delivers `{ type:
     * "infrawrench:provider-oauth", ok, pluginId, accountId?, credentials, accountName? }` (or `{
     * type, ok: false, pluginId, error }`) as `returnTo` asks. `credentials` holds the access
     * token in the plugin's token field, prefilled fields the provider identified, and a sealed
     * `__oauth` grant; send them unchanged to `POST /accounts` or `PUT /accounts/{id}/credentials`
     * within 30 minutes. Requires `accounts:write`. 400 when the plugin has no OAuth flow or this
     * server has no client configured for it.
     *
     * POST /api/org/{orgId}/provider-oauth/{pluginId}/authorize
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param PluginId::* $pluginId
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function authorize(string $pluginId, ProviderOauthAuthorizeRequest $body, ?string $orgId = null, ?RequestOptions $options = null): ProviderOauthAuthorizeResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/provider-oauth/{pluginId}/authorize',
                pathParams: ['orgId' => $orgId, 'pluginId' => $pluginId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ProviderOauthAuthorizeResponse::fromArray(Coerce::toArray($data));
    }
}
