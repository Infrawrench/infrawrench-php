<?php

/*
 * infrawrench/sdk v1.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.12.0).
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
use Infrawrench\Sdk\Model\PreflightReport;
use Infrawrench\Sdk\Model\PreflightRequest;
use Infrawrench\Sdk\RequestOptions;

/** `$client->accounts->preflight` */
final class AccountsPreflightNamespace extends ApiNamespace
{
    /**
     * Probe credentials before creating an account
     *
     * Runs the plugin's per-capability permission checks against the submitted credentials.
     * Nothing is stored — use it from the add-account flow before committing.
     *
     * _Requires permission: `accounts:write`._
     *
     * POST /api/org/{orgId}/accounts/preflight
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(PreflightRequest $body, ?string $orgId = null, ?RequestOptions $options = null): PreflightReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/accounts/preflight',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return PreflightReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Re-run credential preflight on a stored account
     *
     * _Requires permission: `accounts:write`._
     *
     * POST /api/org/{orgId}/accounts/{id}/preflight
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function postOrgOrgIdAccountsIdPreflight(string $id, ?string $orgId = null, ?RequestOptions $options = null): PreflightReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/accounts/{id}/preflight',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return PreflightReport::fromArray(Coerce::toArray($data));
    }
}
