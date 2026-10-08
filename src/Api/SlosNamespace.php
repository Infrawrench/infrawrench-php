<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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
use Infrawrench\Sdk\Model\Slo;
use Infrawrench\Sdk\Model\SloActiveFreeze;
use Infrawrench\Sdk\Model\SloCreate;
use Infrawrench\Sdk\Model\SloFreezeRequest;
use Infrawrench\Sdk\Model\SloSources;
use Infrawrench\Sdk\Model\SloUpdate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->slos` */
final class SlosNamespace extends ApiNamespace
{
    /** `$client->slos->get` */
    public readonly SlosGetNamespace $get;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new SlosGetNamespace($this->transport);
    }

    /**
     * Create an SLO
     *
     * Out-of-range inputs are rejected, not clamped. The source must exist in the organization.
     * The first evaluation runs within one poller tick. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/slos
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?SloCreate $body = null, ?RequestOptions $options = null): Slo
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/slos',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Slo::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an SLO
     *
     * The measured series are untouched. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * DELETE /api/org/{orgId}/slos/{sloId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $sloId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/slos/{sloId}',
                pathParams: ['orgId' => $orgId, 'sloId' => $sloId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * Start a change freeze for an SLO
     *
     * Acts on the freeze suggestion an exhausted budget makes: creates an ordinary change freeze
     * named after the SLO, listed and ended like any other. Needs `freezes:write`.
     *
     * _Requires permission: `freezes:write`._
     *
     * POST /api/org/{orgId}/slos/{sloId}/freeze
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function freeze(string $sloId, ?string $orgId = null, ?SloFreezeRequest $body = null, ?RequestOptions $options = null): ?SloActiveFreeze
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/slos/{sloId}/freeze',
                pathParams: ['orgId' => $orgId, 'sloId' => $sloId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): SloActiveFreeze => SloActiveFreeze::fromArray(Coerce::toArray($value)));
    }

    /**
     * List what an SLO can be measured from
     *
     * Every synthetic probe, and every synced resource that reported a metric series in the last
     * week with the series it reported. Feeds the editor's pickers.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/slos/sources
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function sources(?string $orgId = null, ?RequestOptions $options = null): SloSources
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/slos/sources',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return SloSources::fromArray(Coerce::toArray($data));
    }

    /**
     * Update an SLO
     *
     * Omitted fields keep their value. Changing the source, target or window resets the snapshot
     * and the alert state. Audit-logged.
     *
     * _Requires permission: `resources:write`._
     *
     * PUT /api/org/{orgId}/slos/{sloId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $sloId, ?string $orgId = null, ?SloUpdate $body = null, ?RequestOptions $options = null): Slo
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/slos/{sloId}',
                pathParams: ['orgId' => $orgId, 'sloId' => $sloId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Slo::fromArray(Coerce::toArray($data));
    }
}
