<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
 * `data` of a `service.changed` event, version 1. A service in the catalog was created, edited,
 * deleted, or had resources added or removed.
 *
 * Spec schema: `EventData_service_changed_v1`.
 */
final class EventDataServiceChangedV1 implements \JsonSerializable
{
    /**
     * @param 'created'|'updated'|'deleted' $action What happened to the service.
     * @param string $serviceId Service id.
     * @param string $slug The service's slug.
     * @param string $name Service name.
     * @param int|null $tier Tier 1 (most critical) to 4; null when untiered.
     * @param string|null $ownerTeam Free-text owning team.
     * @param list<string> $changedFields Fields the change touched: the edited service fields, or `members` for a membership change. Empty on create and delete.
     */
    public function __construct(
        public readonly string $action,
        public readonly string $serviceId,
        public readonly string $slug,
        public readonly string $name,
        public readonly ?int $tier,
        public readonly ?string $ownerTeam,
        public readonly array $changedFields,
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
            action: Coerce::toString($data['action'] ?? null),
            serviceId: Coerce::toString($data['serviceId'] ?? null),
            slug: Coerce::toString($data['slug'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            tier: Coerce::toIntOrNull($data['tier'] ?? null),
            ownerTeam: Coerce::toStringOrNull($data['ownerTeam'] ?? null),
            changedFields: Coerce::mapList($data['changedFields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'action' => $this->action,
            'serviceId' => $this->serviceId,
            'slug' => $this->slug,
            'name' => $this->name,
            'tier' => $this->tier,
            'ownerTeam' => $this->ownerTeam,
            'changedFields' => $this->changedFields,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
