<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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
use Infrawrench\Sdk\Model\CostVisibilityPrincipalKind;
use Infrawrench\Sdk\Model\CostVisibilityScope;
use Infrawrench\Sdk\Model\CostVisibilityScopeInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costVisibility` */
final class CostVisibilityNamespace extends ApiNamespace
{
    /**
     * Remove a cost visibility scope
     *
     * _Requires permission: `team:role:write`._
     *
     * DELETE /api/org/{orgId}/cost-visibility/{principalKind}/{principalId}
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param CostVisibilityPrincipalKind::* $principalKind
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $principalKind, string $principalId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/cost-visibility/{principalKind}/{principalId}',
                pathParams: ['orgId' => $orgId, 'principalKind' => $principalKind, 'principalId' => $principalId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List cost visibility scopes
     *
     * Every scope narrowing which cost rows a role, member or API key can see. Scopes that apply
     * to one caller are intersected.
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/cost-visibility
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{scopes: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-visibility',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Create or replace a cost visibility scope
     *
     * Upserts the scope of one principal. Roles and members need `team:role:write`; an API key's
     * owner may also scope their own key with `apikeys:write`. Owners cannot be scoped, and
     * cost-scoped callers cannot change scopes.
     *
     * _Requires permission: `team:role:write`._
     *
     * PUT /api/org/{orgId}/cost-visibility
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?string $orgId = null, ?CostVisibilityScopeInput $body = null, ?RequestOptions $options = null): CostVisibilityScope
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-visibility',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return CostVisibilityScope::fromArray(Coerce::toArray($data));
    }
}
