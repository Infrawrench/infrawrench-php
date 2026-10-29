<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

/**
 * `data` of a `metric_alert.resolved` event, version 1. A firing metric alert went back within its
 * threshold.
 *
 * Spec schema: `EventData_metric_alert_resolved_v1`.
 */
final class EventDataMetricAlertResolvedV1 implements \JsonSerializable
{
    /**
     * @param string $ruleId Metric alert rule id.
     * @param string $ruleName Rule name.
     * @param string $metricKey The metric the rule watches.
     * @param string $comparator How `threshold` is compared.
     * @param float $threshold The rule's threshold.
     * @param int $forMinutes How long the condition must hold.
     * @param string $resourceId The resource the metric belongs to.
     * @param string $resourceName Resource display name.
     * @param float|null $observed The value that tripped the rule; null on resolve.
     * @param string $alertEventId Metric alert event id (shared by a firing and its resolve).
     */
    public function __construct(
        public readonly string $ruleId,
        public readonly string $ruleName,
        public readonly string $metricKey,
        public readonly string $comparator,
        public readonly float $threshold,
        public readonly int $forMinutes,
        public readonly string $resourceId,
        public readonly string $resourceName,
        public readonly ?float $observed,
        public readonly string $alertEventId,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            ruleName: Coerce::toString($data['ruleName'] ?? null),
            metricKey: Coerce::toString($data['metricKey'] ?? null),
            comparator: Coerce::toString($data['comparator'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            forMinutes: Coerce::toInt($data['forMinutes'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            observed: Coerce::toFloatOrNull($data['observed'] ?? null),
            alertEventId: Coerce::toString($data['alertEventId'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'ruleId' => $this->ruleId,
            'ruleName' => $this->ruleName,
            'metricKey' => $this->metricKey,
            'comparator' => $this->comparator,
            'threshold' => $this->threshold,
            'forMinutes' => $this->forMinutes,
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'observed' => $this->observed,
            'alertEventId' => $this->alertEventId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
