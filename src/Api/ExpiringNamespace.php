<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
use Infrawrench\Sdk\Model\ExpiryListResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->expiring` */
final class ExpiringNamespace extends ApiNamespace
{
    /** `$client->expiring->settings` */
    public readonly ExpiringSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->settings = new ExpiringSettingsNamespace($this->transport);
    }

    /**
     * List approaching deadlines on synced resources
     *
     * One cross-provider countdown of everything with a clock on it: TLS certificate expiries,
     * domain registrations, API token expirations, access keys past their rotation budget,
     * Kubernetes/SSH credential ages. Plugins declare which synced fields carry deadlines; the
     * feed is computed over already-stored state, so no provider API calls are made and results
     * reflect the last sync. Items are sorted soonest first and bucketed by severity against the
     * organization's lead time.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/expiring
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ExpiryListResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/expiring',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ExpiryListResponse::fromArray(Coerce::toArray($data));
    }
}
