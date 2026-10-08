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

final class OrgConfigSlo implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param 'probe_availability'|'probe_latency'|'metric_threshold' $sliKind
     * @param string|null $probeKey `probe_*`: key of a probe in this document's `probes` or the organization's.
     * @param array{pluginId: string, resourceTypeId: string, externalId: string, account: string}|null $resource `metric_threshold`: the resource, resolved against the organization's inventory on apply.
     * @param '<'|'<='|'>'|'>='|null $comparator
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly string $sliKind,
        public readonly float $targetPercent,
        public readonly ?string $description = null,
        public readonly ?string $probeKey = null,
        public readonly ?int $latencyThresholdMs = null,
        public readonly ?array $resource = null,
        public readonly ?string $metricKey = null,
        public readonly ?string $comparator = null,
        public readonly ?float $threshold = null,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            sliKind: Coerce::toString($data['sliKind'] ?? null),
            targetPercent: Coerce::toFloat($data['targetPercent'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            probeKey: Coerce::toStringOrNull($data['probeKey'] ?? null),
            latencyThresholdMs: Coerce::toIntOrNull($data['latencyThresholdMs'] ?? null),
            resource: Coerce::toArrayOrNull($data['resource'] ?? null),
            metricKey: Coerce::toStringOrNull($data['metricKey'] ?? null),
            comparator: Coerce::toStringOrNull($data['comparator'] ?? null),
            threshold: Coerce::toFloatOrNull($data['threshold'] ?? null),
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
            'key' => $this->key,
            'name' => $this->name,
            'sliKind' => $this->sliKind,
            'targetPercent' => $this->targetPercent,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->probeKey !== null) {
            $payload['probeKey'] = $this->probeKey;
        }
        if ($this->latencyThresholdMs !== null) {
            $payload['latencyThresholdMs'] = $this->latencyThresholdMs;
        }
        if ($this->resource !== null) {
            $payload['resource'] = $this->resource;
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
