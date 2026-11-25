<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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

final class MigrationUnmatchedRow implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param MigrationCategory::*|null $category
     * @param 'no-category'|'no-target-type' $reason
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly ?string $category,
        public readonly string $reason,
        public readonly ?MigrationCost $current,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            category: Coerce::toStringOrNull($data['category'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            current: Coerce::nullable($data['current'] ?? null, static fn (mixed $value): MigrationCost => MigrationCost::fromArray(Coerce::toArray($value))),
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
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'category' => $this->category,
            'reason' => $this->reason,
            'current' => $this->current?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
