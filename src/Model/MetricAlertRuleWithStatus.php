<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class MetricAlertRuleWithStatus implements \JsonSerializable
{
    /**
     * @param string|null $pluginId Selector: plugin the resource must belong to. Null matches any plugin.
     * @param string|null $resourceTypeId Selector: resource type within the plugin. Null matches any type.
     * @param string|null $tagKey Selector: tag key the resource must carry (matched case-insensitively). Null applies no tag filter. Resources are always selected by this query, never by id, so rules cover resources created later.
     * @param string|null $tagValue Selector: exact value tagKey must have. Null matches any value.
     * @param string $metricKey The metric series label as the resource's charts report it (see /metric-alerts/metric-keys).
     * @param '>'|'>='|'<'|'<=' $comparator
     * @param int $forMinutes Trailing window (minutes) the condition must hold for before firing.
     * @param int $cooldownMinutes Least minutes between notified firings for one (rule, resource).
     * @param int $firingCount Resources currently in breach of this rule.
     * @param int $matchingResourceCount Resources the selector matches right now.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly ?string $tagKey,
        public readonly ?string $tagValue,
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
        public readonly int $firingCount,
        public readonly int $matchingResourceCount,
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
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
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
            firingCount: Coerce::toInt($data['firingCount'] ?? null),
            matchingResourceCount: Coerce::toInt($data['matchingResourceCount'] ?? null),
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
            'name' => $this->name,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'tagKey' => $this->tagKey,
            'tagValue' => $this->tagValue,
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
            'firingCount' => $this->firingCount,
            'matchingResourceCount' => $this->matchingResourceCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
