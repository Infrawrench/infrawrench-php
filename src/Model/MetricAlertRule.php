<?php

/*
 * infrawrench/sdk v1.102.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.102.0).
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

final class MetricAlertRule implements \JsonSerializable
{
    /**
     * @param string $metricKey The metric series label as the resource's charts report it (see /metric-alerts/metric-keys).
     * @param '>'|'>='|'<'|'<=' $comparator
     * @param int $forMinutes Trailing window (minutes) the condition must hold for before firing.
     * @param int $cooldownMinutes Least minutes between notified firings for one (rule, resource).
     */
    public function __construct(
        public readonly mixed $pluginId,
        public readonly mixed $resourceTypeId,
        public readonly mixed $tagKey,
        public readonly mixed $tagValue,
        public readonly string $name,
        public readonly string $metricKey,
        public readonly string $comparator,
        public readonly float $threshold,
        public readonly int $forMinutes,
        public readonly int $cooldownMinutes,
        public readonly bool $enabled,
        public readonly string $id,
        public readonly ?string $lastEvalAt,
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
            pluginId: $data['pluginId'] ?? null,
            resourceTypeId: $data['resourceTypeId'] ?? null,
            tagKey: $data['tagKey'] ?? null,
            tagValue: $data['tagValue'] ?? null,
            name: Coerce::toString($data['name'] ?? null),
            metricKey: Coerce::toString($data['metricKey'] ?? null),
            comparator: Coerce::toString($data['comparator'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            forMinutes: Coerce::toInt($data['forMinutes'] ?? null),
            cooldownMinutes: Coerce::toInt($data['cooldownMinutes'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            lastEvalAt: Coerce::toStringOrNull($data['lastEvalAt'] ?? null),
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
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'tagKey' => $this->tagKey,
            'tagValue' => $this->tagValue,
            'name' => $this->name,
            'metricKey' => $this->metricKey,
            'comparator' => $this->comparator,
            'threshold' => $this->threshold,
            'forMinutes' => $this->forMinutes,
            'cooldownMinutes' => $this->cooldownMinutes,
            'enabled' => $this->enabled,
            'id' => $this->id,
            'lastEvalAt' => $this->lastEvalAt,
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
