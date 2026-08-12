<?php

/*
 * infrawrench/sdk v1.15.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.15.0).
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
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs->anomalies` */
final class CostsAnomaliesNamespace extends ApiNamespace
{
    /**
     * Explain a detected cost anomaly
     *
     * Record what a finding actually was, and publish that sentence as a cost annotation on
     * **every** chart covering the anomalous day — the point being that 'we migrated the fleet' is
     * not a fact about whichever report somebody happened to open. The note's date (the anomalous
     * day) and its org-wide scope are derived from the anomaly and are not the caller's to choose.
     *
     * The reply is the updated anomaly, carrying `acknowledgement` with the id of the note it
     * created. Sending it again replaces the sentence and rewords that note rather than filing a
     * second one; it will not recreate a note that has since been deleted, since deleting a note
     * is a deliberate act and the finding stays explained without it.
     *
     * This does not suppress detection. If the same provider or service spikes again on a later
     * day, that is a new anomaly and it is detected and alerted on as normal.
     *
     * POST /api/org/{orgId}/costs/anomalies/{anomalyId}/acknowledge
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param array{explanation: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function acknowledge(string $anomalyId, ?string $orgId = null, ?array $body = null, ?RequestOptions $options = null): CostAnomaly
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/anomalies/{anomalyId}/acknowledge',
                pathParams: ['orgId' => $orgId, 'anomalyId' => $anomalyId],
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return CostAnomaly::fromArray(Coerce::toArray($data));
    }

    /**
     * List recently detected cost anomalies
     *
     * Spend anomalies detected by the daily background pass. Two kinds share the list: a `spike`,
     * where a provider's or service's spend exceeded its trailing 28-day baseline by a statistical
     * threshold (mean + N·stddev, with an absolute floor to ignore penny-scale noise), and a
     * `new_source`, where a provider or service with no spend at all across that window suddenly
     * billed a material amount. Thresholds are per organization — see GET /costs/anomaly-settings.
     * Newest day first, capped at 200 rows.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/anomalies
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $days Window in days over anomalous days, 1-90. Defaults to 30.
     * @return array{anomalies: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?string $days = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/anomalies',
                pathParams: ['orgId' => $orgId],
                query: ['days' => $days],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }
}
