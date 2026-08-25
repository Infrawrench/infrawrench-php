<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class EnvironmentDiffEntry implements \JsonSerializable
{
    /**
     * @param string $key The pairing key both sides matched on — the resource type plus the resource name with environment words removed. Stable across runs.
     * @param 'only-in-a'|'only-in-b'|'changed' $status Whether the slot exists on side A only, side B only, or on both with a field divergence. Matched pairs that agree are counted in the type summary rather than listed.
     * @param list<EnvironmentDiffFieldChange> $changes Field divergences. Empty unless `status` is `changed`.
     * @param int $suppressedCount Divergences hidden by the identity filter (ids, links, addresses, timestamps). Always 0 when `includeIdentityFields` was requested.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $status,
        public readonly ?EnvironmentDiffResourceRef $a,
        public readonly ?EnvironmentDiffResourceRef $b,
        public readonly array $changes,
        public readonly int $suppressedCount,
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
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            a: Coerce::nullable($data['a'] ?? null, static fn (mixed $value): EnvironmentDiffResourceRef => EnvironmentDiffResourceRef::fromArray(Coerce::toArray($value))),
            b: Coerce::nullable($data['b'] ?? null, static fn (mixed $value): EnvironmentDiffResourceRef => EnvironmentDiffResourceRef::fromArray(Coerce::toArray($value))),
            changes: Coerce::mapList($data['changes'] ?? null, static fn (mixed $item): EnvironmentDiffFieldChange => EnvironmentDiffFieldChange::fromArray(Coerce::toArray($item))),
            suppressedCount: Coerce::toInt($data['suppressedCount'] ?? null),
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
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'status' => $this->status,
            'a' => $this->a?->toArray(),
            'b' => $this->b?->toArray(),
            'changes' => array_map(static fn (EnvironmentDiffFieldChange $item): array => $item->toArray(), $this->changes),
            'suppressedCount' => $this->suppressedCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
