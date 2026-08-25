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
use Infrawrench\Sdk\Model\OnCallOverride;
use Infrawrench\Sdk\Model\OnCallOverrideCreate;
use Infrawrench\Sdk\RequestOptions;

/** `$client->onCall->overrides` */
final class OnCallOverridesNamespace extends ApiNamespace
{
    /**
     * Arrange cover
     *
     * A cover beats the rotation for exactly its window. Among several overlapping covers the one
     * that **started most recently** wins, so a later-written cover supersedes an earlier one
     * rather than the answer depending on row order.
     *
     * Takes `team:read`, not a settings permission: cover is arranged at 17:55 on a Friday and the
     * person handing over is rarely an org admin. Every cover is audit-logged, which is the
     * control that makes the looser permission safe.
     *
     * POST /api/org/{orgId}/on-call/overrides
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?OnCallOverrideCreate $body = null, ?RequestOptions $options = null): OnCallOverride
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/on-call/overrides',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return OnCallOverride::fromArray(Coerce::toArray($data));
    }

    /**
     * Cancel a cover
     *
     * DELETE /api/org/{orgId}/on-call/overrides/{overrideId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $overrideId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/on-call/overrides/{overrideId}',
                pathParams: ['orgId' => $orgId, 'overrideId' => $overrideId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List covers
     *
     * GET /api/org/{orgId}/on-call/overrides
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{overrides: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $scheduleId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/on-call/overrides',
                pathParams: ['orgId' => $orgId],
                query: ['scheduleId' => $scheduleId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
