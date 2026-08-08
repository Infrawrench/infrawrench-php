<?php

/*
 * infrawrench/sdk v0.43.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.43.0).
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
use Infrawrench\Sdk\Model\CreditBurndown;
use Infrawrench\Sdk\RequestOptions;

/** `$client->credits` */
final class CreditsNamespace extends ApiNamespace
{
    /**
     * Prepaid credit balances, burn rate and runway
     *
     * Every prepaid pot the organization holds, most urgent first. A provider that bills in
     * arrears sends an invoice you can argue with; a prepaid pot that empties simply stops
     * answering — so this is an availability number as much as a finance one.
     *
     * The burn rate is measured from the server's own series of readings rather than reported by
     * the provider, and it is the sum of the **decreases** between consecutive readings: a top-up
     * inside the window is recorded separately, never netted off. The runway is bounded by both
     * the burn and the credit's own expiry, whichever comes first.
     *
     * Only providers that expose a balance appear here; most bill in arrears and have no pot.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/credits
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CreditBurndown
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/credits',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CreditBurndown::fromArray(Coerce::toArray($data));
    }
}
