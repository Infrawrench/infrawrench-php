<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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
use Infrawrench\Sdk\Model\AllocationRule;
use Infrawrench\Sdk\Model\AllocationRuleInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\SwapAllocationRulesBody;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costCentres->rules` */
final class CostCentresRulesNamespace extends ApiNamespace
{
    /**
     * Create an allocation rule
     *
     * Maps spend onto a cost centre. Rules evaluate first-match-wins by ascending priority against
     * each cost row's tags, account, provider, and service.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-centres/rules
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(AllocationRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): AllocationRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-centres/rules',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AllocationRule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete an allocation rule
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-centres/rules/{id}
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
                path: '/api/org/{orgId}/cost-centres/rules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List allocation rules in evaluation order
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-centres/rules
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AllocationRule>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-centres/rules',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AllocationRule => AllocationRule::fromArray(Coerce::toArray($item)));
    }

    /**
     * Swap the priorities of two allocation rules
     *
     * Atomically swaps priorities so first-match-wins order can be edited without a half-applied
     * pair of independent updates.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-centres/rules/swap
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<AllocationRule>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function swap(SwapAllocationRulesBody $body, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-centres/rules/swap',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): AllocationRule => AllocationRule::fromArray(Coerce::toArray($item)));
    }

    /**
     * Update an allocation rule
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-centres/rules/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, AllocationRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): AllocationRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-centres/rules/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AllocationRule::fromArray(Coerce::toArray($data));
    }
}
