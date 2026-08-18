<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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
use Infrawrench\Sdk\Model\QuotaListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->quotas` */
final class QuotasNamespace extends ApiNamespace
{
    /** `$client->quotas->settings` */
    public readonly QuotasSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new QuotasSettingsNamespace($this->transport);
    }

    /**
     * List provider quota utilisation across the organization
     *
     * How close each account is to the limits its provider enforces, with the trend fitted over
     * the last 14 days of collected readings. Both halves of every row — the used figure and the
     * limit — come from the provider; nothing is filled in from published defaults, so an account
     * with an approved increase reads as having the headroom it has. This is a read over
     * already-collected snapshots: no provider API calls are made here, and the readings are as
     * fresh as the last collection pass (roughly six hours). A plugin that declares no quota
     * capability contributes nothing rather than zero — see `unsupportedPluginIds`.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/quotas
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): QuotaListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/quotas',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return QuotaListResponse::fromArray(Coerce::toArray($data));
    }
}
