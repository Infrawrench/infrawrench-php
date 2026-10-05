<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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
use Infrawrench\Sdk\Model\AlertEmailSettings;
use Infrawrench\Sdk\Model\AlertEmailSettingsView;
use Infrawrench\Sdk\RequestOptions;

/** `$client->alertEmail->settings` */
final class AlertEmailSettingsNamespace extends ApiNamespace
{
    /**
     * Get the alert email policy and suppression list
     *
     * GET /api/org/{orgId}/alert-email/settings
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): AlertEmailSettingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/alert-email/settings',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return AlertEmailSettingsView::fromArray(Coerce::toArray($data));
    }

    /**
     * Set the alert email external-address policy
     *
     * Whole object. Tightening the policy does not edit any stored recipient list: an address that
     * no longer passes is skipped at send time, and loosening the policy again brings it back.
     *
     * PUT /api/org/{orgId}/alert-email/settings
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?AlertEmailSettings $body = null, ?RequestOptions $options = null): AlertEmailSettingsView
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/alert-email/settings',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return AlertEmailSettingsView::fromArray(Coerce::toArray($data));
    }
}
