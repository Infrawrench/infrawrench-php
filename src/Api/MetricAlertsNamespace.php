<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
use Infrawrench\Sdk\Model\MetricAlertEvent;
use Infrawrench\Sdk\Model\MetricAlertRule;
use Infrawrench\Sdk\Model\MetricAlertRuleInput;
use Infrawrench\Sdk\Model\MetricAlertRuleWithStatus;
use Infrawrench\Sdk\Model\MetricAlertSelectorOptions;
use Infrawrench\Sdk\Model\MetricAlertSelectorPreview;
use Infrawrench\Sdk\Model\MetricSeriesKey;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->metricAlerts` */
final class MetricAlertsNamespace extends ApiNamespace
{
    /**
     * Create a metric alert rule
     *
     * Rules select resources by query (plugin + resource type + tag), never by id list, so a rule
     * automatically covers resources created after it was written. The poller evaluates enabled
     * rules about once a minute and alerts when the condition held for the whole trailing window.
     *
     * POST /api/org/{orgId}/metric-alerts
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(MetricAlertRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): MetricAlertRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/metric-alerts',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MetricAlertRule::fromArray(Coerce::toArray($data));
    }

    /**
     * Delete a metric alert rule
     *
     * Soft delete. The rule's firing history stays readable via /metric-alerts/events.
     *
     * DELETE /api/org/{orgId}/metric-alerts/{id}
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
                path: '/api/org/{orgId}/metric-alerts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Recent metric alert firings
     *
     * GET /api/org/{orgId}/metric-alerts/events
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<MetricAlertEvent>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function events(?string $orgId = null, ?string $ruleId = null, ?int $limit = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts/events',
                pathParams: ['orgId' => $orgId],
                query: ['ruleId' => $ruleId, 'limit' => $limit],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): MetricAlertEvent => MetricAlertEvent::fromArray(Coerce::toArray($item)));
    }

    /**
     * Get a metric alert rule
     *
     * GET /api/org/{orgId}/metric-alerts/{id}
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(string $id, ?string $orgId = null, ?RequestOptions $options = null): MetricAlertRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
            ),
            $options,
        );

        return MetricAlertRule::fromArray(Coerce::toArray($data));
    }

    /**
     * List metric alert rules with live firing status
     *
     * GET /api/org/{orgId}/metric-alerts
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<MetricAlertRuleWithStatus>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function list(?string $orgId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): MetricAlertRuleWithStatus => MetricAlertRuleWithStatus::fromArray(Coerce::toArray($item)));
    }

    /**
     * List metric series that actually exist
     *
     * The series labels resources reported in the last 7 days, optionally narrowed to one plugin
     * and resource type — what the rule builder's metric picker is fed from.
     *
     * GET /api/org/{orgId}/metric-alerts/metric-keys
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @return list<MetricSeriesKey>
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function metricKeys(?string $orgId = null, ?string $pluginId = null, ?string $resourceTypeId = null, ?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts/metric-keys',
                pathParams: ['orgId' => $orgId],
                query: ['pluginId' => $pluginId, 'resourceTypeId' => $resourceTypeId],
            ),
            $options,
        );

        return Coerce::mapList($data, static fn (mixed $item): MetricSeriesKey => MetricSeriesKey::fromArray(Coerce::toArray($item)));
    }

    /**
     * List what the organization's resources offer to select on
     *
     * GET /api/org/{orgId}/metric-alerts/selector-options
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function selectorOptions(?string $orgId = null, ?RequestOptions $options = null): MetricAlertSelectorOptions
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts/selector-options',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return MetricAlertSelectorOptions::fromArray(Coerce::toArray($data));
    }

    /**
     * Preview which resources a selector matches right now
     *
     * GET /api/org/{orgId}/metric-alerts/selector-preview
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function selectorPreview(?string $orgId = null, ?string $pluginId = null, ?string $resourceTypeId = null, ?string $tagKey = null, ?string $tagValue = null, ?RequestOptions $options = null): MetricAlertSelectorPreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/metric-alerts/selector-preview',
                pathParams: ['orgId' => $orgId],
                query: ['pluginId' => $pluginId, 'resourceTypeId' => $resourceTypeId, 'tagKey' => $tagKey, 'tagValue' => $tagValue],
            ),
            $options,
        );

        return MetricAlertSelectorPreview::fromArray(Coerce::toArray($data));
    }

    /**
     * Update a metric alert rule
     *
     * PUT /api/org/{orgId}/metric-alerts/{id}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $id, MetricAlertRuleInput $body, ?string $orgId = null, ?RequestOptions $options = null): MetricAlertRule
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PUT',
                path: '/api/org/{orgId}/metric-alerts/{id}',
                pathParams: ['orgId' => $orgId, 'id' => $id],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return MetricAlertRule::fromArray(Coerce::toArray($data));
    }
}
