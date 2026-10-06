<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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
     * Removing a rate makes the days it covered fall back to the next-older rate, then the
     * automatic feed when on, or to unconverted if none applies. Spend never disappears: it
     * reverts to its own currency.
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
     * Upserts on (`fromCurrency`, `toCurrency`, `effectiveFrom`): one rate per pair per day, so
     * correcting a rate replaces it rather than adding a second one whose precedence a reader
     * would have to guess. Stated rates are one hop to the display currency and are never inverted
     * or chained. A stated rate always wins over the automatic feed for the days it covers; give
     * it an `effectiveTo` to hand the days after back to the feed.
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
