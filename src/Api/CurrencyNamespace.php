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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\CurrencyConfig;
use Infrawrench\Sdk\Model\CurrencySettings;
use Infrawrench\Sdk\Model\CurrencySettingsInput;
use Infrawrench\Sdk\Model\ExchangeRateLookup;
use Infrawrench\Sdk\Model\FxFeedRates;
use Infrawrench\Sdk\RequestOptions;

/** `$client->currency` */
final class CurrencyNamespace extends ApiNamespace
{
    /** `$client->currency->rates` */
    public readonly CurrencyRatesNamespace $rates;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->rates = new CurrencyRatesNamespace($this->transport);
    }

    /**
     * Automatic reference rates for one day
     *
     * Every rate the ECB feed holds for `date` (default today; weekends and holidays carry the
     * last publication), expressed in `base` (default the display currency, else EUR), plus the
     * feed's state. Readable whether or not the organization has automatic rates on.
     *
     * GET /api/org/{orgId}/currency/feed
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $base ISO 4217 code, upper-case.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function feed(?string $orgId = null, ?string $date = null, ?string $base = null, ?RequestOptions $options = null): FxFeedRates
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/currency/feed',
                pathParams: ['orgId' => $orgId],
                query: ['date' => $date, 'base' => $base],
            ),
            $options,
        );

        return FxFeedRates::fromArray(Coerce::toArray($data));
    }

    /**
     * The org's currency settings, exchange rate table and feed state
     *
     * Readable with `costs:read` rather than a settings permission: anyone who can see a converted
     * total has to be able to see what it was converted at, or the number is unauditable. `feed`
     * reports the automatic ECB reference-rate feed (global, the same for every organization): its
     * newest publication, its coverage and its last error.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/currency
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): CurrencyConfig
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/currency',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return CurrencyConfig::fromArray(Coerce::toArray($data));
    }

    /**
     * Which rate a day of spend converts at
     *
     * Applies the organization's precedence (a stated rate covering the day, else the automatic
     * feed when on, at the day or month-end rate per `rateBasis`) and explains the outcome. `to`
     * defaults to the display currency; `date` defaults to today.
     *
     * GET /api/org/{orgId}/currency/lookup
     *
     * Raises on 400: Bad request
     *
     * @param string $from ISO 4217 code, upper-case.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $to ISO 4217 code, upper-case.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function lookup(string $from, ?string $orgId = null, ?string $to = null, ?string $date = null, ?RequestOptions $options = null): ExchangeRateLookup
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/currency/lookup',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'date' => $date],
            ),
            $options,
        );

        return ExchangeRateLookup::fromArray(Coerce::toArray($data));
    }

    /**
     * Save the org's currency settings
     *
     * Setting a display currency opts the organization into converted totals; `null` turns
     * conversion off everywhere and restores the per-currency view. Clearing does not delete the
     * rate table, so conversion can be turned back on without re-stating anything. With
     * `autoRates` off, only currencies with a stated rate are converted; with it on, the daily ECB
     * reference rates fill the days no stated rate covers.
     *
     * _Requires permission: `org:settings:write`._
     *
     * PUT /api/org/{orgId}/currency
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(CurrencySettingsInput $body, ?string $orgId = null, ?RequestOptions $options = null): CurrencySettings
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/currency',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CurrencySettings::fromArray(Coerce::toArray($data));
    }
}
