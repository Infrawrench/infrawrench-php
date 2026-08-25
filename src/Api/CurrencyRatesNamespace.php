<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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
use Infrawrench\Sdk\Model\ExchangeRate;
use Infrawrench\Sdk\Model\ExchangeRateInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->currency->rates` */
final class CurrencyRatesNamespace extends ApiNamespace
{
    /**
     * Delete one exchange rate
     *
     * Removing a rate makes the days it covered fall back to the next-older rate, or to
     * unconverted if none remains. Spend never disappears — it reverts to its own currency.
     *
     * _Requires permission: `org:settings:write`._
     *
     * DELETE /api/org/{orgId}/currency/rates/{rateId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{ok: bool}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $rateId, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/currency/rates/{rateId}',
                pathParams: ['orgId' => $orgId, 'rateId' => $rateId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Create or replace one exchange rate
     *
     * Upserts on (`fromCurrency`, `toCurrency`, `effectiveFrom`) — one rate per pair per day, so
     * correcting a rate replaces it rather than adding a second one whose precedence a reader
     * would have to guess. Rates are stated to the display currency in one hop: nothing inverts a
     * rate or chains two, because both produce a number you never stated.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/currency/rates
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(ExchangeRateInput $body, ?string $orgId = null, ?RequestOptions $options = null): ExchangeRate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/currency/rates',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ExchangeRate::fromArray(Coerce::toArray($data));
    }
}
