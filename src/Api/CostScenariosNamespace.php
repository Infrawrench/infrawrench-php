<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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
use Infrawrench\Sdk\Model\CostScenarioModel;
use Infrawrench\Sdk\Model\CostScenarioModelInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costScenarios` */
final class CostScenariosNamespace extends ApiNamespace
{
    /** `$client->costScenarios->get` */
    public readonly CostScenariosGetNamespace $get;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->get = new CostScenariosGetNamespace($this->transport);
    }

    /**
     * Create a scenario model
     *
     * Names must be unique per organization (case-insensitively) — the name is what a chart prints
     * under its scenario line and what the CLI's `--scenario <name>` addresses, so two models
     * sharing one would make both meaningless. A model needs at least one adjustment: an empty
     * model changes nothing, which is the same as applying no scenario.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/cost-scenarios
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: A live scenario model already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostScenarioModelInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostScenarioModel
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/cost-scenarios',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostScenarioModel::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a scenario model
     *
     * Soft delete — **refused with a 409 while anything references the model**, with the referents
     * in the body. For a chart, deleting would silently drop the assumptions from a projection
     * somebody is reading; for a budget it would move the forecast thresholds back to the bare
     * trend, changing when people get paged. Detaching the referents is a deliberate step, never a
     * side effect of deletion.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/cost-scenarios/{id}
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Still referenced — the body lists every referent.
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
                path: '/api/org/{orgId}/cost-scenarios/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List a scenario model's referents
     *
     * Every budget, cost report and dashboard cost graph referencing this model — what an edit
     * will change, and what a delete would be refused over. Budgets come first: they are the
     * referents that page people.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/cost-scenarios/{id}/referents
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{referents: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function referents(string $id, ?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/cost-scenarios/{id}/referents',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Update a scenario model
     *
     * Replaces the whole model. This is the high-leverage write: every chart drawing it, and
     * **every budget whose forecast thresholds are measured against it**, uses the new numbers on
     * its next evaluation — which for a budget can change which alerts fire. `GET /{id}/referents`
     * names what a change will touch.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/cost-scenarios/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * Raises on 409: A live scenario model already uses this name.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, CostScenarioModelInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostScenarioModel
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/cost-scenarios/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostScenarioModel::fromArray(Coerce::toArray($data));
    }
}
