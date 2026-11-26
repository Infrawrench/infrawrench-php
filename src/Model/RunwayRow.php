<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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

final class RunwayRow implements \JsonSerializable
{
    /**
     * @param string $key The usage's key within the resource: a field or output key, or `metric:<series>`.
     * @param ResourceTypeId::* $resourceTypeId
     * @param PluginId::* $pluginId
     * @param string|null $unit What both numbers count. `bytes` is a byte count; anything else is a word.
     * @param float $utilization used / limit, not clamped at 1.
     * @param 'provider'|'plan'|'constant' $limitSource Whose number the limit is: `provider` (read from the resource itself, so it follows resizes), `plan` (the provider's published allowance for the plan in `plan`), or `constant` (a fixed documented ceiling).
     * @param 'runway'|'allowance' $kind `allowance` resets every month; `runway` accumulates until it hits the limit.
     * @param 'field'|'output'|'metric' $source
     * @param string $observedAt When the current reading was taken.
     * @param 'full'|'critical'|'watch'|'ok' $status Where the usage sits: `full` (used >= limit now), `critical` (alerting: reaches the limit within the organization's runway days on a clean trend, or a monthly allowance is past the allowance threshold or projected past its limit before the cycle resets), `watch` (inside the runway days but the trend is too noisy to alert on), or `ok`.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $resourceId,
        public readonly string $resourceName,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $label,
        public readonly ?string $unit,
        public readonly float $used,
        public readonly float $limit,
        public readonly float $utilization,
        public readonly string $limitSource,
        public readonly ?string $plan,
        public readonly string $kind,
        public readonly string $source,
        public readonly string $observedAt,
        public readonly RunwayForecast $forecast,
        public readonly ?RunwayCycle $cycle,
        public readonly string $status,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            unit: Coerce::toStringOrNull($data['unit'] ?? null),
            used: Coerce::toFloat($data['used'] ?? null),
            limit: Coerce::toFloat($data['limit'] ?? null),
            utilization: Coerce::toFloat($data['utilization'] ?? null),
            limitSource: Coerce::toString($data['limitSource'] ?? null),
            plan: Coerce::toStringOrNull($data['plan'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            observedAt: Coerce::toString($data['observedAt'] ?? null),
            forecast: RunwayForecast::fromArray(Coerce::toArray($data['forecast'] ?? null)),
            cycle: Coerce::nullable($data['cycle'] ?? null, static fn (mixed $value): RunwayCycle => RunwayCycle::fromArray(Coerce::toArray($value))),
            status: Coerce::toString($data['status'] ?? null),
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
            'key' => $this->key,
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'label' => $this->label,
            'unit' => $this->unit,
            'used' => $this->used,
            'limit' => $this->limit,
            'utilization' => $this->utilization,
            'limitSource' => $this->limitSource,
            'plan' => $this->plan,
            'kind' => $this->kind,
            'source' => $this->source,
            'observedAt' => $this->observedAt,
            'forecast' => $this->forecast->toArray(),
            'cycle' => $this->cycle?->toArray(),
            'status' => $this->status,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
