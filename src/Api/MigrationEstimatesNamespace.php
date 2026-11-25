<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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
use Infrawrench\Sdk\Model\MigrationEstimate;
use Infrawrench\Sdk\Model\MigrationEstimateInput;
use Infrawrench\Sdk\Model\MigrationEstimateResult;
use Infrawrench\Sdk\Model\MigrationScenarioCreated;
use Infrawrench\Sdk\Model\MigrationScenarioInput;
use Infrawrench\Sdk\Model\MigrationTargets;
use Infrawrench\Sdk\Model\MigrationTerraformResult;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->migrationEstimates` */
final class MigrationEstimatesNamespace extends ApiNamespace
{
    /**
     * Save a migration estimate
     *
     * Stores the inputs only; the figures are computed on every read. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/migration-estimates
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(MigrationEstimateInput $body, ?string $orgId = null, ?RequestOptions $options = null): MigrationEstimate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/migration-estimates',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MigrationEstimate::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a migration estimate
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/migration-estimates/{id}
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
                path: '/api/org/{orgId}/migration-estimates/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Get a saved migration estimate
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/migration-estimates/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): MigrationEstimate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/migration-estimates/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return MigrationEstimate::fromArray(Coerce::toArray($data));
    }

    /**
     * List saved migration estimates
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/migration-estimates
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<MigrationEstimate>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/migration-estimates',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): MigrationEstimate => MigrationEstimate::fromArray(Coerce::toArray($item)));
    }

    /**
     * Compute an unsaved migration estimate
     *
     * Matches each resource to the target's type of the same category, picks the cheapest size
     * meeting or exceeding its vCPUs, memory and GPUs (or the override), and prices it beside what
     * the resource costs now. Resources with no equivalent are listed apart with the reason. A
     * figure nothing can price is null, never 0. A read despite the method.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/migration-estimates/preview
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function preview(MigrationEstimateInput $body, ?string $orgId = null, ?RequestOptions $options = null): MigrationEstimateResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/migration-estimates/preview',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MigrationEstimateResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Compute a saved migration estimate
     *
     * The saved inputs priced now: current spend as the caller's cost visibility scope sees it,
     * and today's list prices.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/migration-estimates/{id}/result
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function result(string $id, ?string $orgId = null, ?RequestOptions $options = null): MigrationEstimateResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/migration-estimates/{id}/result',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return MigrationEstimateResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Turn an estimate into a scenario model
     *
     * Creates a scenario model with one recurring monthly amount, the estimate's paired delta
     * (target minus current over the rows priced on both sides), from `startDate`. 400 when the
     * estimate has no single-currency delta. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/migration-estimates/{id}/scenario
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function scenario(string $id, MigrationScenarioInput $body, ?string $orgId = null, ?RequestOptions $options = null): MigrationScenarioCreated
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/migration-estimates/{id}/scenario',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MigrationScenarioCreated::fromArray(Coerce::toArray($data));
    }

    /**
     * Providers an estimate can target
     *
     * Every provider with at least one resource type that declares a cross-provider category, with
     * its categories, the regions it can be priced in (with their area) and whether pricing it
     * needs one of the org's accounts.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/migration-estimates/targets
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function targets(?string $orgId = null, ?RequestOptions $options = null): MigrationTargets
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/migration-estimates/targets',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return MigrationTargets::fromArray(Coerce::toArray($data));
    }

    /**
     * Terraform for the target provider
     *
     * HCL for the matched rows through the target plugin's own Terraform export, with each row's
     * matched type, size and region. Rows the export cannot map are listed with the reason. 400
     * when the target has no Terraform export.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/migration-estimates/{id}/terraform
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function terraform(string $id, ?string $orgId = null, ?RequestOptions $options = null): MigrationTerraformResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/migration-estimates/{id}/terraform',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return MigrationTerraformResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Replace a migration estimate
     *
     * Name, source, target, region and overrides together. Audit-logged.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/migration-estimates/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, MigrationEstimateInput $body, ?string $orgId = null, ?RequestOptions $options = null): MigrationEstimate
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/migration-estimates/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MigrationEstimate::fromArray(Coerce::toArray($data));
    }
}
