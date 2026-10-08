<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class Slo implements \JsonSerializable
{
    /**
     * @param string $name Unique in the organization; at most 120 characters.
     * @param string|null $description At most 500 characters.
     * @param float $targetPercent Objective as a percentage, at least 50 and at most 99.999.
     * @param float $windowDays Rolling window in days.
     * @param bool $alertsEnabled Route burn-rate and exhaustion alerts through the org's alert routing rules.
     * @param bool $suggestFreeze When the budget runs out, the alert and the page suggest a change freeze.
     * @param 'probe_availability'|'probe_latency'|'metric_threshold' $sliKind Where the SLI comes from: a synthetic probe's success ratio, the share of a probe's checks at or under a latency threshold, or the share of minutes a resource's metric series satisfies a comparison.
     * @param string|null $probeId `probe_*`: the synthetic probe the SLI is read from.
     * @param int|null $latencyThresholdMs `probe_latency`: a check is good at or under this many ms (1-60000).
     * @param string|null $resourceId `metric_threshold`: the synced resource reporting the series.
     * @param string|null $metricKey `metric_threshold`: the series label as the resource reports it, e.g. "CPU %".
     * @param '<'|'<='|'>'|'>='|null $comparator `metric_threshold` only: a minute is good when `value <comparator> threshold`.
     * @param float|null $threshold `metric_threshold`: the comparison's right side.
     * @param string|null $probeName The probe's name; null when it was deleted.
     * @param string|null $resourceName The resource's name; null when it is gone.
     * @param 'exhausted'|'fast_burn'|'slow_burn'|'ok'|'unknown' $status Worst true thing first: `exhausted` (no budget left), `fast_burn` (a page-severity burn-rate pair is firing), `slow_burn` (the ticket pair), `ok`, or `unknown` (no data in the window, never evaluated, or disabled).
     * @param float|null $sli Fraction of good events over the window (0-1).
     * @param float $totalEvents Minutes with data in the window.
     * @param float|null $budgetRemaining Fraction of the window's error budget left; negative when overspent.
     * @param float $budgetTotalMinutes The window's whole budget in minutes (43.2 for 99.9% over 30 days).
     * @param array<string, float|null> $burnRates Burn rate per window (`5m`, `30m`, `1h`, `6h`, `3d`); 1 is exactly on budget, null where the window held no events.
     * @param 'none'|'slow'|'fast' $burnAlert The alert level the evaluator last settled on.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly float $targetPercent,
        public readonly float $windowDays,
        public readonly bool $alertsEnabled,
        public readonly bool $suggestFreeze,
        public readonly bool $enabled,
        public readonly string $sliKind,
        public readonly ?string $probeId,
        public readonly ?int $latencyThresholdMs,
        public readonly ?string $resourceId,
        public readonly ?string $metricKey,
        public readonly ?string $comparator,
        public readonly ?float $threshold,
        public readonly ?string $probeName,
        public readonly ?string $resourceName,
        public readonly ?string $accountId,
        public readonly mixed $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly string $status,
        public readonly ?float $sli,
        public readonly float $goodEvents,
        public readonly float $totalEvents,
        public readonly ?float $budgetRemaining,
        public readonly float $budgetTotalMinutes,
        public readonly ?float $budgetRemainingMinutes,
        public readonly array $burnRates,
        public readonly string $burnAlert,
        public readonly ?string $exhaustedAt,
        public readonly ?string $lastEvalAt,
        public readonly ?string $lastError,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            targetPercent: Coerce::toFloat($data['targetPercent'] ?? null),
            windowDays: Coerce::toFloat($data['windowDays'] ?? null),
            alertsEnabled: Coerce::toBool($data['alertsEnabled'] ?? null),
            suggestFreeze: Coerce::toBool($data['suggestFreeze'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            sliKind: Coerce::toString($data['sliKind'] ?? null),
            probeId: Coerce::toStringOrNull($data['probeId'] ?? null),
            latencyThresholdMs: Coerce::toIntOrNull($data['latencyThresholdMs'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            metricKey: Coerce::toStringOrNull($data['metricKey'] ?? null),
            comparator: Coerce::toStringOrNull($data['comparator'] ?? null),
            threshold: Coerce::toFloatOrNull($data['threshold'] ?? null),
            probeName: Coerce::toStringOrNull($data['probeName'] ?? null),
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            pluginId: $data['pluginId'] ?? null,
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            sli: Coerce::toFloatOrNull($data['sli'] ?? null),
            goodEvents: Coerce::toFloat($data['goodEvents'] ?? null),
            totalEvents: Coerce::toFloat($data['totalEvents'] ?? null),
            budgetRemaining: Coerce::toFloatOrNull($data['budgetRemaining'] ?? null),
            budgetTotalMinutes: Coerce::toFloat($data['budgetTotalMinutes'] ?? null),
            budgetRemainingMinutes: Coerce::toFloatOrNull($data['budgetRemainingMinutes'] ?? null),
            burnRates: Coerce::mapValues($data['burnRates'] ?? null, static fn (mixed $item): ?float => Coerce::toFloatOrNull($item)),
            burnAlert: Coerce::toString($data['burnAlert'] ?? null),
            exhaustedAt: Coerce::toStringOrNull($data['exhaustedAt'] ?? null),
            lastEvalAt: Coerce::toStringOrNull($data['lastEvalAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'targetPercent' => $this->targetPercent,
            'windowDays' => $this->windowDays,
            'alertsEnabled' => $this->alertsEnabled,
            'suggestFreeze' => $this->suggestFreeze,
            'enabled' => $this->enabled,
            'sliKind' => $this->sliKind,
            'probeId' => $this->probeId,
            'latencyThresholdMs' => $this->latencyThresholdMs,
            'resourceId' => $this->resourceId,
            'metricKey' => $this->metricKey,
            'comparator' => $this->comparator,
            'threshold' => $this->threshold,
            'probeName' => $this->probeName,
            'resourceName' => $this->resourceName,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'status' => $this->status,
            'sli' => $this->sli,
            'goodEvents' => $this->goodEvents,
            'totalEvents' => $this->totalEvents,
            'budgetRemaining' => $this->budgetRemaining,
            'budgetTotalMinutes' => $this->budgetTotalMinutes,
            'budgetRemainingMinutes' => $this->budgetRemainingMinutes,
            'burnRates' => $this->burnRates,
            'burnAlert' => $this->burnAlert,
            'exhaustedAt' => $this->exhaustedAt,
            'lastEvalAt' => $this->lastEvalAt,
            'lastError' => $this->lastError,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
