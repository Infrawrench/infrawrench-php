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
use Infrawrench\Sdk\Model\CostAnomalySuppression;
use Infrawrench\Sdk\Model\CostAnomalySuppressionInput;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->anomalySuppressions` */
final class CostsAnomalySuppressionsNamespace extends ApiNamespace
{
    /**
     * Create an anomaly suppression
     *
     * Declare that spend in a scope is expected on a pattern of days until an expiry. An
     * organization can hold at most 100 active suppressions (409 past that).
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/costs/anomaly-suppressions
     *
     * Raises on 400: Bad request
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(CostAnomalySuppressionInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?CostAnomalySuppression
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/anomaly-suppressions',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): CostAnomalySuppression => CostAnomalySuppression::fromArray(Coerce::toArray($value)));
    }

    /**
     * Delete an anomaly suppression
     *
     * The findings it suppressed keep their rows. Any whose day detection still re-judges (the
     * last three days) becomes eligible to alert on the next pass.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $suppressionId, ?string $orgId = null, ?RequestOptions $options = null): void
    {
        $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}',
                pathParams: ['orgId' => $orgId, 'suppressionId' => $suppressionId],
                accept: 'empty',
            ),
            $options,
        );
    }

    /**
     * List anomaly suppressions
     *
     * Every suppression of the organization, active ones first (soonest expiry first), then
     * expired ones, most recent first. Expired suppressions are kept so the list can show what
     * they suppressed.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/anomaly-suppressions
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{suppressions: list<array<string, mixed>|null>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/anomaly-suppressions',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Get an anomaly suppression
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdCostsAnomalySuppressionsSuppressionId(string $suppressionId, ?string $orgId = null, ?RequestOptions $options = null): ?CostAnomalySuppression
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}',
                pathParams: ['orgId' => $orgId, 'suppressionId' => $suppressionId],
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): CostAnomalySuppression => CostAnomalySuppression::fromArray(Coerce::toArray($value)));
    }

    /**
     * Update an anomaly suppression
     *
     * Replaces the whole object. Takes effect on the next detection pass.
     *
     * _Requires permission: `costs:write`._
     *
     * PUT /api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $suppressionId, CostAnomalySuppressionInput $body, ?string $orgId = null, ?RequestOptions $options = null): ?CostAnomalySuppression
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/costs/anomaly-suppressions/{suppressionId}',
                pathParams: ['orgId' => $orgId, 'suppressionId' => $suppressionId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Coerce::nullable($data, static fn (mixed $value): CostAnomalySuppression => CostAnomalySuppression::fromArray(Coerce::toArray($value)));
    }
}
