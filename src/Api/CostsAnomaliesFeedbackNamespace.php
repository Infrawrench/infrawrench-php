<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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
use Infrawrench\Sdk\Model\CostAnomaly;
use Infrawrench\Sdk\Model\CostAnomalyFeedbackInput;
use Infrawrench\Sdk\Model\CostAnomalyFeedbackResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->anomalies->feedback` */
final class CostsAnomaliesFeedbackNamespace extends ApiNamespace
{
    /**
     * Mark a cost anomaly expected or unexpected
     *
     * Record whether a finding was expected (planned or known) or unexpected (a real problem),
     * with an optional reason category and note. The verdict tunes detection: repeated `expected`
     * verdicts on a provider or service raise its spike threshold within bounds (see GET
     * /costs/anomaly-sensitivity), and an `expected` verdict with `suppress` creates a suppression
     * so the same pattern does not alert again. `unexpected` keeps sensitivity where it is and
     * removes any suppression an earlier `expected` verdict on the same anomaly created. Sending
     * again replaces the verdict.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/costs/anomalies/{anomalyId}/feedback
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $anomalyId, CostAnomalyFeedbackInput $body, ?string $orgId = null, ?RequestOptions $options = null): CostAnomalyFeedbackResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/anomalies/{anomalyId}/feedback',
                pathParams: ['orgId' => $orgId, 'anomalyId' => $anomalyId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostAnomalyFeedbackResult::fromArray(Coerce::toArray($data));
    }

    /**
     * Withdraw a cost anomaly verdict
     *
     * Clears the verdict and deletes the suppression it created, if any. Suppressions made by hand
     * are never touched.
     *
     * _Requires permission: `costs:write`._
     *
     * DELETE /api/org/{orgId}/costs/anomalies/{anomalyId}/feedback
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $anomalyId, ?string $orgId = null, ?RequestOptions $options = null): CostAnomaly
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/costs/anomalies/{anomalyId}/feedback',
                pathParams: ['orgId' => $orgId, 'anomalyId' => $anomalyId],
            ),
            $options,
        );

        return CostAnomaly::fromArray(Coerce::toArray($data));
    }
}
