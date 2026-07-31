<?php

/*
 * infrawrench/sdk v0.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.19.0).
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
use Infrawrench\Sdk\Model\DeployEnvs;
use Infrawrench\Sdk\Model\DeployEnvsInput;
use Infrawrench\Sdk\Model\DeployPlanInput;
use Infrawrench\Sdk\Model\DeployPlanResult;
use Infrawrench\Sdk\Model\DeployRepo;
use Infrawrench\Sdk\RequestOptions;

/** `$client->deployments` */
final class DeploymentsNamespace extends ApiNamespace
{
    /** `$client->deployments->runs` */
    public readonly DeploymentsRunsNamespace $runs;

    /** `$client->deployments->triggers` */
    public readonly DeploymentsTriggersNamespace $triggers;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->runs = new DeploymentsRunsNamespace($this->transport);
        $this->triggers = new DeploymentsTriggersNamespace($this->transport);
    }

    /**
     * List the environments a repository's Infrafile declares
     *
     * Reads `Infrafile` at the branch head and returns its declared environments. The file is
     * parsed, not executed.
     *
     * _Requires permission: `deployments:read`._
     *
     * POST /api/org/{orgId}/deployments/envs
     *
     * Raises on 400: Bad request
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
    public function envs(?string $orgId = null, ?DeployEnvsInput $body = null, ?RequestOptions $options = null): DeployEnvs
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/deployments/envs',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DeployEnvs::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview a deploy without building
     *
     * Runs the Infrafile's `plan()` and renders its Dockerfile, then stops. Nothing is built or
     * deployed.
     *
     * _Requires permission: `deployments:plan`._
     *
     * POST /api/org/{orgId}/deployments/plan
     *
     * Raises on 400: Bad request
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
    public function plan(?string $orgId = null, ?DeployPlanInput $body = null, ?RequestOptions $options = null): DeployPlanResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/deployments/plan',
                pathParams: ['orgId' => $orgId],
                body: $body?->toArray(),
                hasBody: $body !== null,
            ),
            $options,
        );

        return DeployPlanResult::fromArray(Coerce::toArray($data));
    }

    /**
     * List repositories this organization can deploy from
     *
     * Repositories visible to the organization's GitHub App installations. Empty when the app is
     * not configured.
     *
     * _Requires permission: `deployments:read`._
     *
     * GET /api/org/{orgId}/deployments/repos
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Forbidden
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<DeployRepo>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function repos(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/deployments/repos',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): DeployRepo => DeployRepo::fromArray(Coerce::toArray($item)));
    }
}
