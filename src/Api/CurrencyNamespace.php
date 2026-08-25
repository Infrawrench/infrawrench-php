<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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
     * The org's display currency and exchange rate table
     *
     * Readable with `costs:read` rather than a settings permission: anyone who can see a converted
     * total has to be able to see what it was converted at, or the number is unauditable.
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
     * Set or clear the org's display currency
     *
     * Setting a currency opts the organization into converted totals; `null` turns conversion off
     * everywhere and restores the per-currency view. Clearing does not delete the rate table, so
     * conversion can be turned back on without re-stating anything. Only currencies with a
     * configured rate are converted — Infrawrench never fetches live exchange rates.
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
    public function update(CurrencySettings $body, ?string $orgId = null, ?RequestOptions $options = null): CurrencySettings
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
