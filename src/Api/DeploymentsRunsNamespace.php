<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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
use Infrawrench\Sdk\Model\ChangeCostBasis;
use Infrawrench\Sdk\Model\DeployPlanResult;
use Infrawrench\Sdk\Model\DeployRollbackInput;
use Infrawrench\Sdk\Model\DeploymentCostImpact;
use Infrawrench\Sdk\Model\DeploymentRun;
use Infrawrench\Sdk\Model\DeploymentRunInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->deployments->runs` */
final class DeploymentsRunsNamespace extends ApiNamespace
{
    /**
     * Cost impact of a deployment run
     *
     * The same comparison as `POST /changes/cost-impacts`, run over the resources this deploy
     * provisioned, with a per-resource breakdown that sums to the total.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/deployments/runs/{id}/cost-impact
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param ChangeCostBasis::*|null $costBasis Which charge-type basis both windows are read on. `cash` (the default) is what the provider charged on the day it charged it; `amortized` spreads a commitment's up-front fee across the term it buys. It is echoed on every response because a delta whose basis is unstated is unreadable — an amortized 'after' against a cash 'before' looks exactly like a saving.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function costImpact(string $id, ?string $orgId = null, ?int $windowDays = null, ?string $costBasis = null, ?RequestOptions $options = null): DeploymentCostImpact
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/deployments/runs/{id}/cost-impact',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                query: ['windowDays' => $windowDays, 'costBasis' => $costBasis],
            ),
            $options,
        );

        return DeploymentCostImpact::fromArray(Coerce::toArray($data));
    }

    /**
     * Record a deployment that ran elsewhere
     *
     * The CLI builds on the operator's own machine, so the server never sees that run. Reporting
     * it here keeps one history across both origins.
     *
     * _Requires permission: `deployments:write`._
     *
     * POST /api/org/{orgId}/deployments/runs
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{id: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(?string $orgId = null, ?DeploymentRunInput $body = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/deployments/runs',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get one deployment run, with its logs and rendered Dockerfile
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/deployments/runs/{id}
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): DeploymentRun
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/deployments/runs/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return DeploymentRun::fromArray(Coerce::toArray($data));
    }

    /**
     * List deployment runs
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/deployments/runs
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<DeploymentRun>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?string $env = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/deployments/runs',
                pathParams: ['orgId' => $orgId],
                query: ['env' => $env, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): DeploymentRun => DeploymentRun::fromArray(Coerce::toArray($item)));
    }

    /**
     * Roll back to a previous deployment
     *
     * Re-runs that run's `deploy()` with the image and plan it recorded, building nothing — the
     * exact artifact that was known good ships again. The Infrafile is read at the commit that run
     * deployed, not at the branch head. Only a successful run that produced an image can be rolled
     * back to. With `deleteCreated`, resources that runs after the target created through
     * `infra.accounts` are deleted once the rollback has succeeded — undoing the provisioning, not
     * just the shipping. Deletions are best-effort and reported in the result's notes.
     *
     * _Requires permission: `deployments:write`._
     *
     * POST /api/org/{orgId}/deployments/runs/{id}/rollback
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 402: Payment required — the organization's plan does not include this
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * Raises on 423: Blocked by an active change freeze. Retry with the `x-change-freeze-override:
     * true` header if you hold `freezes:override`; both blocks and overrides are audit-logged.
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rollback(string $id, ?string $orgId = null, ?DeployRollbackInput $body = null, ?RequestOptions $options = null): DeployPlanResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/deployments/runs/{id}/rollback',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DeployPlanResult::fromArray(Coerce::toArray($data));
    }
}
