<?php

/*
 * infrawrench/sdk v1.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.12.0).
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

final class OrphanedResource implements \JsonSerializable
{
    /**
     * @param string $id Infrawrench resource id.
     * @param PluginId::* $pluginId
     * @param string|null $externalId Provider-native id, when known.
     * @param string $reason Plugin-authored explanation of why this resource looks wasted.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly string $reason,
        public readonly ?OrphanCostAnnotation $cost,
        public readonly ?ResourceOwnerAnnotation $owner,
        public readonly ?string $lastSyncedAt,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            cost: Coerce::nullable($data['cost'] ?? null, static fn (mixed $value): OrphanCostAnnotation => OrphanCostAnnotation::fromArray(Coerce::toArray($value))),
            owner: Coerce::nullable($data['owner'] ?? null, static fn (mixed $value): ResourceOwnerAnnotation => ResourceOwnerAnnotation::fromArray(Coerce::toArray($value))),
            lastSyncedAt: Coerce::toStringOrNull($data['lastSyncedAt'] ?? null),
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
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'reason' => $this->reason,
            'cost' => $this->cost?->toArray(),
            'owner' => $this->owner?->toArray(),
            'lastSyncedAt' => $this->lastSyncedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
