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

final class SloCreate implements \JsonSerializable
{
    /**
     * @param string $name Unique in the organization; at most 120 characters.
     * @param 'probe_availability'|'probe_latency'|'metric_threshold' $sliKind Where the SLI comes from: a synthetic probe's success ratio, the share of a probe's checks at or under a latency threshold, or the share of minutes a resource's metric series satisfies a comparison.
     * @param string|null $description At most 500 characters.
     * @param string|null $probeId `probe_*`: the synthetic probe the SLI is read from.
     * @param int|null $latencyThresholdMs `probe_latency`: a check is good at or under this many ms (1-60000).
     * @param string|null $resourceId `metric_threshold`: the synced resource reporting the series.
     * @param string|null $metricKey `metric_threshold`: the series label as the resource reports it, e.g. "CPU %".
     * @param '<'|'<='|'>'|'>='|null $comparator `metric_threshold` only: a minute is good when `value <comparator> threshold`.
     * @param float|null $threshold `metric_threshold`: the comparison's right side.
     * @param float|null $targetPercent Objective as a percentage, at least 50 and at most 99.999.
     * @param float|null $windowDays Rolling window in days.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $sliKind,
        public readonly ?string $description = null,
        public readonly ?string $probeId = null,
        public readonly ?int $latencyThresholdMs = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $metricKey = null,
        public readonly ?string $comparator = null,
        public readonly ?float $threshold = null,
        public readonly ?float $targetPercent = null,
        public readonly ?float $windowDays = null,
        public readonly ?bool $alertsEnabled = null,
        public readonly ?bool $suggestFreeze = null,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toString($data['name'] ?? null),
            sliKind: Coerce::toString($data['sliKind'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            probeId: Coerce::toStringOrNull($data['probeId'] ?? null),
            latencyThresholdMs: Coerce::toIntOrNull($data['latencyThresholdMs'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            metricKey: Coerce::toStringOrNull($data['metricKey'] ?? null),
            comparator: Coerce::toStringOrNull($data['comparator'] ?? null),
            threshold: Coerce::toFloatOrNull($data['threshold'] ?? null),
            targetPercent: Coerce::toFloatOrNull($data['targetPercent'] ?? null),
            windowDays: Coerce::toFloatOrNull($data['windowDays'] ?? null),
            alertsEnabled: Coerce::toBoolOrNull($data['alertsEnabled'] ?? null),
            suggestFreeze: Coerce::toBoolOrNull($data['suggestFreeze'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'name' => $this->name,
            'sliKind' => $this->sliKind,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->probeId !== null) {
            $payload['probeId'] = $this->probeId;
        }
        if ($this->latencyThresholdMs !== null) {
            $payload['latencyThresholdMs'] = $this->latencyThresholdMs;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->metricKey !== null) {
            $payload['metricKey'] = $this->metricKey;
        }
        if ($this->comparator !== null) {
            $payload['comparator'] = $this->comparator;
        }
        if ($this->threshold !== null) {
            $payload['threshold'] = $this->threshold;
        }
        if ($this->targetPercent !== null) {
            $payload['targetPercent'] = $this->targetPercent;
        }
        if ($this->windowDays !== null) {
            $payload['windowDays'] = $this->windowDays;
        }
        if ($this->alertsEnabled !== null) {
            $payload['alertsEnabled'] = $this->alertsEnabled;
        }
        if ($this->suggestFreeze !== null) {
            $payload['suggestFreeze'] = $this->suggestFreeze;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
