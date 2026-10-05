<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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
use Infrawrench\Sdk\Model\TagKeySettings;
use Infrawrench\Sdk\RequestOptions;

/** `$client->tagKeys->settings` */
final class TagKeysSettingsNamespace extends ApiNamespace
{
    /**
     * The org's hidden and preferred tag keys
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/tag-keys/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): TagKeySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/tag-keys/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return TagKeySettings::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace the org's hidden and preferred tag keys
     *
     * Applied to every tag-key listing the API serves (`GET /costs/dimensions?dimension=tag-keys`,
     * the metric alert selector options, the MCP tools): preferred keys first, hidden keys
     * omitted. A display preference only; no stored data changes.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/tag-keys/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(TagKeySettings $body, ?string $orgId = null, ?RequestOptions $options = null): TagKeySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/tag-keys/settings',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return TagKeySettings::fromArray(Coerce::toArray($data));
    }
}
