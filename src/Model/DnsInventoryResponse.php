<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class DnsInventoryResponse implements \JsonSerializable
{
    /**
     * @param list<DnsZone> $zones Sorted by domain, then account name.
     * @param list<DnsRecord> $records Sorted worst status first, then by name.
     * @param list<DnsSkippedNamespace> $skippedNamespaces Provider namespaces that were declared but not evaluated, and why — either no account for the plugin is connected, or no claimant resource has synced. Both are missing data rather than a clean bill of health, so they are reported rather than hidden.
     */
    public function __construct(
        public readonly array $zones,
        public readonly array $records,
        public readonly DnsInventoryCounts $counts,
        public readonly array $skippedNamespaces,
        public readonly string $generatedAt,
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
            zones: Coerce::mapList($data['zones'] ?? null, static fn (mixed $item): DnsZone => DnsZone::fromArray(Coerce::toArray($item))),
            records: Coerce::mapList($data['records'] ?? null, static fn (mixed $item): DnsRecord => DnsRecord::fromArray(Coerce::toArray($item))),
            counts: DnsInventoryCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
            skippedNamespaces: Coerce::mapList($data['skippedNamespaces'] ?? null, static fn (mixed $item): DnsSkippedNamespace => DnsSkippedNamespace::fromArray(Coerce::toArray($item))),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'zones' => array_map(static fn (DnsZone $item): array => $item->toArray(), $this->zones),
            'records' => array_map(static fn (DnsRecord $item): array => $item->toArray(), $this->records),
            'counts' => $this->counts->toArray(),
            'skippedNamespaces' => array_map(static fn (DnsSkippedNamespace $item): array => $item->toArray(), $this->skippedNamespaces),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
