<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\BillingStatus;
use Infrawrench\Sdk\Model\StripeRedirectUrl;
use Infrawrench\Sdk\RequestOptions;

/** `$client->billing` */
final class BillingNamespace extends ApiNamespace
{
    /** `$client->billing->capacity` */
    public readonly BillingCapacityNamespace $capacity;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->capacity = new BillingCapacityNamespace($this->transport);
    }

    /**
     * Start a Stripe Checkout session
     *
     * Rejected with 400 for complimentary organizations — they are never billed.
     *
     * _Requires permission: `billing:write`._
     *
     * POST /api/org/{orgId}/billing/checkout
     *
     * Raises on 400: Bad request
     *
     * Raises on 500: Server error
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function checkout(?string $orgId = null, ?RequestOptions $options = null): StripeRedirectUrl
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/billing/checkout',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return StripeRedirectUrl::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a Stripe customer portal URL
     *
     * _Requires permission: `billing:write`._
     *
     * POST /api/org/{orgId}/billing/portal
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function portal(?string $orgId = null, ?RequestOptions $options = null): StripeRedirectUrl
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/billing/portal',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return StripeRedirectUrl::fromArray(Coerce::toArray($data));
    }

    /**
     * Get the org's billing status (complimentary flag + subscription or `null`)
     *
     * _Requires permission: `billing:read`._
     *
     * GET /api/org/{orgId}/billing/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): BillingStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/billing/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return BillingStatus::fromArray(Coerce::toArray($data));
    }
}
