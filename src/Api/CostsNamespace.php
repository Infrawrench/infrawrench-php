<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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
use Infrawrench\Sdk\Model\CostDimensionValues;
use Infrawrench\Sdk\Model\CostPushRequest;
use Infrawrench\Sdk\Model\CostPushResponse;
use Infrawrench\Sdk\Model\CostQueryRequest;
use Infrawrench\Sdk\Model\CostQueryResponse;
use Infrawrench\Sdk\Model\ShowbackReport;
use Infrawrench\Sdk\Model\UntaggedSpendReport;
use Infrawrench\Sdk\RequestOptions;

/** `$client->costs` */
final class CostsNamespace extends ApiNamespace
{
    /** `$client->costs->anomalies` */
    public readonly CostsAnomaliesNamespace $anomalies;

    /** `$client->costs->anomalySettings` */
    public readonly CostsAnomalySettingsNamespace $anomalySettings;

    /** `$client->costs->efficiencyAlertSettings` */
    public readonly CostsEfficiencyAlertSettingsNamespace $efficiencyAlertSettings;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->anomalies = new CostsAnomaliesNamespace($this->transport);
        $this->anomalySettings = new CostsAnomalySettingsNamespace($this->transport);
        $this->efficiencyAlertSettings = new CostsEfficiencyAlertSettingsNamespace($this->transport);
    }

    /**
     * List distinct values for a cost dimension
     *
     * Feeds the filter and group-by pickers. Pass dimension=tag-keys for tag keys; dimension=tag
     * requires tagKey. `charge_type` answers from the fixed set of charge types rather than from
     * the stored data, so the picker is populated before any provider has reported one.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/dimensions
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function dimensions(string $dimension, ?string $orgId = null, ?string $tagKey = null, ?RequestOptions $options = null): CostDimensionValues
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/dimensions',
                pathParams: ['orgId' => $orgId],
                query: ['dimension' => $dimension, 'tagKey' => $tagKey],
            ),
            $options,
        );

        return CostDimensionValues::fromArray(Coerce::toArray($data));
    }

    /**
     * Recently fired efficiency alerts
     *
     * The three slow-lane cost alerts in one feed, newest first: commitments about to lapse,
     * commitments that are not being used, and business metrics whose cost per unit rose. Unlike
     * budgets, anomalies and change alerts — all of which compare a spend total against another
     * spend total — these read the commitment calendar and the volume the spend bought, so they
     * see the two surprises the other three structurally cannot.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/efficiency-alerts
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param 'commitment_expiry'|'commitment_idle'|'unit_cost_regression'|null $kind Restrict to one detector. Omitted returns all three, interleaved by time.
     * @param int|null $limit Rows to return, newest first. Defaults to 50.
     * @return array{events: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function efficiencyAlerts(?string $orgId = null, ?string $kind = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/efficiency-alerts',
                pathParams: ['orgId' => $orgId],
                query: ['kind' => $kind, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Query aggregated cost series
     *
     * Aggregates collected provider spend into per-bucket, per-group series for cost graphs.
     * Currencies are never merged; mixed-currency orgs get one series per currency. Optionally
     * returns a previous-period comparison and a trend forecast.
     *
     * `costBasis` chooses between cash and amortized money, and `chargeTypes` narrows which kinds
     * of charge count. Both the comparison period and the forecast are computed on the same basis
     * and charge types as the series itself.
     *
     * The filter can be sent structurally as `filters` or as text in the cost query language via
     * `query` (`provider = 'aws' AND tag['env'] != 'dev'`). They are two spellings of one filter:
     * sending both is a 400, and a query that does not parse is a 400 carrying the offset of the
     * mistake.
     *
     * _Requires permission: `costs:read`._
     *
     * POST /api/org/{orgId}/costs/query
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function query(CostQueryRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CostQueryResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/query',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostQueryResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Push cost rows from your own systems
     *
     * Reports spend Infrawrench has no provider plugin for — a parsed SaaS invoice, an internal
     * chargeback, a colo bill — into the same store the provider collectors write to, so it
     * appears in cost graphs, dimension filters, and budgets alongside everything else.
     *
     * Rows are grouped under a caller-chosen `source`. Writes are idempotent per `(source, day,
     * service, region, resourceId, tags, currency)`: pushing the same day again restates that day
     * rather than adding to it, so a nightly job can safely re-push a trailing window. Rows pushed
     * under a source can never overwrite rows a provider collector wrote.
     *
     * The whole batch is validated before anything is stored, so a 400 means nothing was written.
     *
     * _Requires permission: `costs:write`._
     *
     * POST /api/org/{orgId}/costs/rows
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function rows(CostPushRequest $body, ?string $orgId = null, ?RequestOptions $options = null): CostPushResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/costs/rows',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return CostPushResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * Spend grouped by cost centre (showback)
     *
     * Runs the org's allocation rules over collected spend and sums per cost centre and currency.
     * Spend no rule claims comes back as the "Unallocated" bucket; every defined centre appears
     * even with zero spend.
     *
     * Cost centres nest, so the list is a depth-first tree. Each entry carries `totals` (spend
     * allocated directly to it) and `subtreeTotals` (its own plus every descendant's) —
     * "Engineering, of which Platform" needs both. Rules still evaluate first-match-wins by
     * ascending priority against a flat list, so a row is allocated exactly once even when a rule
     * targets a parent and another targets its child; at equal priority the more deeply nested
     * centre wins.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/showback
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Defaults to 30 days ago.
     * @param string|null $to Defaults to today.
     * @param 'cash'|'amortized'|null $basis Which money to sum. `cash` (the default) is what the provider charged on the day it charged it; `amortized` spreads a commitment's up-front fee across the term it buys. Providers that report no amortized amount fall back to their cash amount.
     * @param 'true'|'false'|null $adjusted Apply the organization's billing rules (see /billing-rules): markups multiply, and a reallocation moves a centre's spend onto another centre. Off by default — a chargeback report that silently showed marked-up numbers is one the receiving team could not reconcile. On, the response carries `adjustment` with the collected totals beside the adjusted ones. Fixed-amount rules are booked onto the cost centre they name (or "Unallocated" when they name none), pro-rated across the period.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function showback(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $basis = null, ?string $adjusted = null, ?RequestOptions $options = null): ShowbackReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/showback',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'basis' => $basis, 'adjusted' => $adjusted],
            ),
            $options,
        );

        return ShowbackReport::fromArray(Coerce::toArray($data));
    }

    /**
     * Per-account cost collection status
     *
     * Which accounts support cost collection, whether their history backfill has completed, and
     * the ingested date coverage.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/status
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return array{accounts: list<array<string, mixed>>}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function status(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/status',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Untagged spend over the required tag keys
     *
     * Spend on cost rows missing at least one of the org's required tag keys, overall and per key,
     * plus the largest untagged (account, service) buckets. Empty when no tag policy is configured
     * — untagged is only meaningful against a policy.
     *
     * _Requires permission: `costs:read`._
     *
     * GET /api/org/{orgId}/costs/untagged
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @param string|null $from Defaults to 30 days ago.
     * @param string|null $to Defaults to today.
     * @param 'cash'|'amortized'|null $basis Which money to sum. `cash` (the default) is what the provider charged on the day it charged it; `amortized` spreads a commitment's up-front fee across the term it buys. Providers that report no amortized amount fall back to their cash amount.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function untagged(?string $orgId = null, ?string $from = null, ?string $to = null, ?string $basis = null, ?RequestOptions $options = null): UntaggedSpendReport
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/costs/untagged',
                pathParams: ['orgId' => $orgId],
                query: ['from' => $from, 'to' => $to, 'basis' => $basis],
            ),
            $options,
        );

        return UntaggedSpendReport::fromArray(Coerce::toArray($data));
    }
}
