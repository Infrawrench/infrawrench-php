<?php

/*
 * infrawrench/sdk v1.122.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.122.0).
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
use Infrawrench\Sdk\Model\AssociationCandidate;
use Infrawrench\Sdk\Model\AssociationRequest;
use Infrawrench\Sdk\Model\LiteralAssociationRequest;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->associations` */
final class AssociationsNamespace extends ApiNamespace
{
    /**
     * List the resources whose outputs can fill a secret field
     *
     * A candidate is a stored resource whose type hands one of its outputs to the field's plugin
     * under the field's key (a peer integration's credential mapping) and whose fields pass that
     * integration's visibility gates. Send one to `POST /associations` to point the field at it.
     *
     * _Requires permission: `resources:read`._
     *
     * GET /api/org/{orgId}/associations/candidates
     *
     * Raises on 404: Not found
     *
     * @param string $resourceId The resource holding the field.
     * @param string $fieldKey The secret field to fill, e.g. `connectionString`.
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AssociationCandidate>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function candidates(string $resourceId, string $fieldKey, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/associations/candidates',
                pathParams: ['orgId' => $orgId],
                query: ['resourceId' => $resourceId, 'fieldKey' => $fieldKey],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AssociationCandidate => AssociationCandidate::fromArray(Coerce::toArray($item)));
    }

    /**
     * Wire one resource's output into another resource's secret field
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/associations
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(AssociationRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/associations',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Set a secret field to a literal plaintext value
     *
     * When the resource's plugin applies a new value upstream (resetting a database password,
     * say), it does so first; a refusal there answers 502 and stores nothing.
     *
     * _Requires permission: `secrets:write`._
     *
     * POST /api/org/{orgId}/associations/literal
     *
     * Raises on 404: Not found
     *
     * Raises on 502: Bad gateway: an upstream service failed
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function literal(LiteralAssociationRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/associations/literal',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
