<?php

/*
 * infrawrench/sdk v0.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.29.0).
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

final class ExpiryListResponse implements \JsonSerializable
{
    /**
     * @param list<ExpiryItem> $items All tracked deadlines, soonest first (`ok` items included).
     * @param int $leadDays The lead time the `upcoming` bucket was computed against.
     */
    public function __construct(
        public readonly array $items,
        public readonly int $totalCount,
        public readonly ExpirySeverityCounts $counts,
        public readonly int $leadDays,
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
            items: Coerce::mapList($data['items'] ?? null, static fn (mixed $item): ExpiryItem => ExpiryItem::fromArray(Coerce::toArray($item))),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            counts: ExpirySeverityCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
            leadDays: Coerce::toInt($data['leadDays'] ?? null),
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
            'items' => array_map(static fn (ExpiryItem $item): array => $item->toArray(), $this->items),
            'totalCount' => $this->totalCount,
            'counts' => $this->counts->toArray(),
            'leadDays' => $this->leadDays,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
