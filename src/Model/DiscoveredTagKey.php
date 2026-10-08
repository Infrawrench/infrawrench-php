<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class DiscoveredTagKey implements \JsonSerializable
{
    /**
     * @param list<string> $providers Plugin ids whose cost rows or resources carry the key.
     * @param list<'costs'|'resources'> $sources
     * @param int $costRowCount Cost rows in the lookback window carrying the key.
     * @param int $costResourceCount Distinct billed resource ids among those rows.
     * @param int $inventoryCount Synced resources whose tags or labels carry the key (newest 2,000 scanned).
     * @param string|null $lastSeen Most recent cost day carrying the key; null when only in the inventory.
     * @param string|null $hiddenBy The hidden entry (exact key or prefix pattern) that matched.
     */
    public function __construct(
        public readonly string $key,
        public readonly array $providers,
        public readonly array $sources,
        public readonly int $costRowCount,
        public readonly int $costResourceCount,
        public readonly int $inventoryCount,
        public readonly ?string $lastSeen,
        public readonly bool $hidden,
        public readonly ?string $hiddenBy,
        public readonly bool $preferred,
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
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            costRowCount: Coerce::toInt($data['costRowCount'] ?? null),
            costResourceCount: Coerce::toInt($data['costResourceCount'] ?? null),
            inventoryCount: Coerce::toInt($data['inventoryCount'] ?? null),
            lastSeen: Coerce::toStringOrNull($data['lastSeen'] ?? null),
            hidden: Coerce::toBool($data['hidden'] ?? null),
            hiddenBy: Coerce::toStringOrNull($data['hiddenBy'] ?? null),
            preferred: Coerce::toBool($data['preferred'] ?? null),
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
            'providers' => $this->providers,
            'sources' => $this->sources,
            'costRowCount' => $this->costRowCount,
            'costResourceCount' => $this->costResourceCount,
            'inventoryCount' => $this->inventoryCount,
            'lastSeen' => $this->lastSeen,
            'hidden' => $this->hidden,
            'hiddenBy' => $this->hiddenBy,
            'preferred' => $this->preferred,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
