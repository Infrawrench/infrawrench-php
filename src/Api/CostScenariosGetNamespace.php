<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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
use Infrawrench\Sdk\Model\CostScenarioModel;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costScenarios->get` */
final class CostScenariosGetNamespace extends ApiNamespace
{
    /**
     * List scenario models
     *
     * Named, reusable sets of adjustments an organization overlays on a cost forecast — the
     * **known future cost a trend fit cannot see**. Pass an id as `POST /costs/query`'s
     * `scenarioModelId` (alongside `forecast: true`) to get the adjusted projection back *beside*
     * the unadjusted one, never instead of it.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-scenarios
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{models: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-scenarios',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get a scenario model
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-scenarios/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdCostScenariosId(string $id, ?string $orgId = null, ?RequestOptions $options = null): CostScenarioModel
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-scenarios/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return CostScenarioModel::fromArray(Coerce::toArray($data));
    }
}
