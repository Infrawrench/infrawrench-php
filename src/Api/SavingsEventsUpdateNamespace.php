<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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
use Infrawrench\Sdk\Model\SavingsEvent;
use Infrawrench\Sdk\Model\SavingsEventAnnotation;
use Infrawrench\Sdk\Model\SavingsEventInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->savings->events->update` */
final class SavingsEventsUpdateNamespace extends ApiNamespace
{
    /**
     * Annotate a saving
     *
     * Add context to any event: a note, an explicit cost centre, a horizon override, or an end
     * date. The facts of an automatic event (what was done, when, the projection) stay as
     * observed.
     *
     * PATCH /api/org/{orgId}/savings/events/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function patchOrgOrgIdSavingsEventsId(string $id, SavingsEventAnnotation $body, ?string $orgId = null, ?RequestOptions $options = null): SavingsEvent
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/savings/events/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavingsEvent::fromArray(Coerce::toArray($data));
    }

    /**
     * Rewrite a manual saving
     *
     * Full replace of a manual entry. Automatic events are a 400; use PATCH.
     *
     * PUT /api/org/{orgId}/savings/events/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, SavingsEventInput $body, ?string $orgId = null, ?RequestOptions $options = null): SavingsEvent
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/savings/events/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return SavingsEvent::fromArray(Coerce::toArray($data));
    }
}
