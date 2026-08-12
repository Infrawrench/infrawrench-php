<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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
use Infrawrench\Sdk\Model\ConnectEnvDeployRequest;
use Infrawrench\Sdk\Model\ConnectSecretExportRequest;
use Infrawrench\Sdk\Model\ConnectTemplatesRequest;
use Infrawrench\Sdk\Model\ConnectTemplatesResponse;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->connect` */
final class ConnectNamespace extends ApiNamespace
{
    /**
     * Deploy env vars from a source resource to an SSH target
     *
     * _Requires permission: `resources:execute`._
     *
     * POST /api/org/{orgId}/connect/env-deploy
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function envDeploy(ConnectEnvDeployRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/connect/env-deploy',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Materialize source outputs as a secret in the target (e.g. K8s)
     *
     * _Requires permission: `resources:write`._
     *
     * POST /api/org/{orgId}/connect/secret-export
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function secretExport(ConnectSecretExportRequest $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/connect/secret-export',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List secret-export templates and target capabilities
     *
     * _Requires permission: `resources:read`._
     *
     * POST /api/org/{orgId}/connect/templates
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function templates(ConnectTemplatesRequest $body, ?string $orgId = null, ?RequestOptions $options = null): ConnectTemplatesResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/connect/templates',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ConnectTemplatesResponse::fromArray(Coerce::toArray($data));
    }
}
