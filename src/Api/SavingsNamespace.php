<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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
use Infrawrench\Sdk\Model\RealizedSavingsReport;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savings` */
final class SavingsNamespace extends ApiNamespace
{
    /** `$client->savings->events` */
    public readonly SavingsEventsNamespace $events;

    /** `$client->savings->settings` */
    public readonly SavingsSettingsNamespace $settings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->events = new SavingsEventsNamespace($this->transport);
        $this->settings = new SavingsSettingsNamespace($this->transport);
    }

    /**
     * Realized savings report
     *
     * What the actions taken actually saved, against each resource's own trailing daily spend
     * before the action, accrued day by day (one-off actions up to the horizon). Recomputed on
     * every read, so figures improve as restated billing lands. Days collection has not covered
     * are not accrued. Per-currency throughout; never converted or merged.
     *
     * GET /api/org/{orgId}/savings/realized
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Inclusive first day. Defaults to the first of the month 11 months back.
     * @param string|null $to Inclusive last day. Defaults to yesterday.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function realized(?string $orgId = null, ?string $from = null, ?string $to = null, ?RequestOptions $options = null): RealizedSavingsReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/savings/realized',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to],
            ),
            $options,
        );

        return RealizedSavingsReport::fromArray(Coerce::toArray($data));
    }
}
