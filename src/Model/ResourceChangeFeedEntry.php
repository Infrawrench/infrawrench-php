<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class ResourceChangeFeedEntry implements \JsonSerializable
{
    /**
     * @param string $displayName Resource display name at the time of the change — survives deletion.
     * @param ResourceChangeKind::* $changeKind
     * @param list<ResourceFieldChange> $diff Changed fields for `updated` events; empty for `created` and `deleted`.
     * @param 'schedule'|null $origin Who caused the change when a non-sync writer knows: `schedule` for sleep/wake schedule transitions. Absent/null = observed by sync.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $displayName,
        public readonly string $changeKind,
        public readonly array $diff,
        public readonly string $createdAt,
        public readonly ?string $accountName,
        public readonly ?string $origin = null,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            changeKind: Coerce::toString($data['changeKind'] ?? null),
            diff: Coerce::mapList($data['diff'] ?? null, static fn (mixed $item): ResourceFieldChange => ResourceFieldChange::fromArray(Coerce::toArray($item))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            origin: Coerce::toStringOrNull($data['origin'] ?? null),
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
            'id' => $this->id,
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'displayName' => $this->displayName,
            'changeKind' => $this->changeKind,
            'diff' => array_map(static fn (ResourceFieldChange $item): array => $item->toArray(), $this->diff),
            'createdAt' => $this->createdAt,
            'accountName' => $this->accountName,
        ];
        if ($this->origin !== null) {
            $payload['origin'] = $this->origin;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
