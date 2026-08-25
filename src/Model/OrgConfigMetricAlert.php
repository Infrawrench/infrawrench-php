<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class OrgConfigMetricAlert implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param '>'|'>='|'<'|'<=' $comparator
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly string $metricKey,
        public readonly string $comparator,
        public readonly float $threshold,
        public readonly ?string $pluginId = null,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $tagKey = null,
        public readonly ?string $tagValue = null,
        public readonly ?int $forMinutes = null,
        public readonly ?int $cooldownMinutes = null,
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
            metricKey: Coerce::toString($data['metricKey'] ?? null),
            comparator: Coerce::toString($data['comparator'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            tagValue: Coerce::toStringOrNull($data['tagValue'] ?? null),
            forMinutes: Coerce::toIntOrNull($data['forMinutes'] ?? null),
            cooldownMinutes: Coerce::toIntOrNull($data['cooldownMinutes'] ?? null),
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
            'metricKey' => $this->metricKey,
            'comparator' => $this->comparator,
            'threshold' => $this->threshold,
        ];
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }
        if ($this->tagValue !== null) {
            $payload['tagValue'] = $this->tagValue;
        }
        if ($this->forMinutes !== null) {
            $payload['forMinutes'] = $this->forMinutes;
        }
        if ($this->cooldownMinutes !== null) {
            $payload['cooldownMinutes'] = $this->cooldownMinutes;
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
