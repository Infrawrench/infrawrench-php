<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
use Infrawrench\Sdk\Model\AlertEmailOptions;
use Infrawrench\Sdk\RequestOptions;

/** `$client->alertEmail` */
final class AlertEmailNamespace extends ApiNamespace
{
    /** `$client->alertEmail->settings` */
    public readonly AlertEmailSettingsNamespace $settings;

    /** `$client->alertEmail->suppressions` */
    public readonly AlertEmailSuppressionsNamespace $suppressions;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new AlertEmailSettingsNamespace($this->transport);
        $this->suppressions = new AlertEmailSuppressionsNamespace($this->transport);
    }

    /**
     * Recipient picker options for alert email
     *
     * Current members (with their login address), the external-address policy and whether email is
     * available on this deployment: everything a client needs to edit the `emailRecipients` on a
     * budget, cost change alert, anomaly settings or efficiency alert settings, or an email
     * destination on an alert routing rule. Requires `costs:read`.
     *
     * GET /api/org/{orgId}/alert-email
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): AlertEmailOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/alert-email',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return AlertEmailOptions::fromArray(Coerce::toArray($data));
    }
}
