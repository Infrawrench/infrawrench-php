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
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SavingsEvent;
use Infrawrench\Sdk\Model\SavingsEventInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savings->events` */
final class SavingsEventsNamespace extends ApiNamespace
{
    /** `$client->savings->events->update` */
    public readonly SavingsEventsUpdateNamespace $update;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->update = new SavingsEventsUpdateNamespace($this->transport);
    }

    /**
     * Log a saving
     *
     * Record a saving by hand, with the monthly amount and the day it began. Leaves an org-wide
     * cost annotation on that day. Requires `costs:write`.
     *
     * POST /api/org/{orgId}/savings/events
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(SavingsEventInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavingsEvent
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/savings/events',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavingsEvent::fromArray(Coerce::toArray($data));
    }

    /**
     * Remove a saving
     *
     * Hard delete, together with the cost annotation the event left on the charts.
     *
     * DELETE /api/org/{orgId}/savings/events/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $id, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/savings/events/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
