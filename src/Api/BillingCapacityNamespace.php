<?php

/*
 * infrawrench/sdk v1.16.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.16.0).
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
use Infrawrench\Sdk\Model\CapacityCheckoutRequest;
use Infrawrench\Sdk\Model\StripeRedirectUrl;
use Infrawrench\Sdk\RequestOptions;

/** `$client->billing->capacity` */
final class BillingCapacityNamespace extends ApiNamespace
{
    /**
     * Start a Stripe Checkout session for prepaid capacity slots
     *
     * A capacity slot is one seat bought outright for a fixed term instead of rented monthly, and
     * it grants paid-plan access on its own. This is a one-time payment, so the seats are granted
     * by the `checkout.session.completed` webhook once Stripe confirms the payment — a 200 here
     * only means the buyer was sent to a payment page. Rejected with 400 for complimentary
     * organizations, and 503 when the deployment has no one-time capacity price configured.
     *
     * POST /api/org/{orgId}/billing/capacity/checkout
     *
     * Raises on 400: Bad request
     *
     * Raises on 500: Server error
     *
     * Raises on 503: A backing service this endpoint depends on is not available
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function checkout(?string $orgId = null, ?CapacityCheckoutRequest $body = null, ?RequestOptions $options = null): StripeRedirectUrl
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/billing/capacity/checkout',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return StripeRedirectUrl::fromArray(Coerce::toArray($data));
    }
}
