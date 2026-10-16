<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class ResourceReportRows implements \JsonSerializable
{
    /**
     * @param list<ResourceReportColumn> $columns
     * @param list<ResourceReportRow> $rows
     * @param int $total Matching resources; a lower bound when `truncated`.
     * @param bool $truncated A filter or the sort needed the in-memory scan and it stopped at 100,000 resources.
     * @param array{available: bool, reason: string|null, basis: CostBasis::*, windows: list<array{window: 'range'|'mtd'|'previous_month', from: string, to: string}>}|null $cost Null when the report has no cost or virtual tag column.
     */
    public function __construct(
        public readonly array $columns,
        public readonly array $rows,
        public readonly int $total,
        public readonly int $offset,
        public readonly int $limit,
        public readonly bool $truncated,
        public readonly ?ResourceReportSort $sort,
        public readonly ?array $cost,
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
            columns: Coerce::mapList($data['columns'] ?? null, static fn (mixed $item): ResourceReportColumn => ResourceReportColumn::fromArray(Coerce::toArray($item))),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): ResourceReportRow => ResourceReportRow::fromArray(Coerce::toArray($item))),
            total: Coerce::toInt($data['total'] ?? null),
            offset: Coerce::toInt($data['offset'] ?? null),
            limit: Coerce::toInt($data['limit'] ?? null),
            truncated: Coerce::toBool($data['truncated'] ?? null),
            sort: Coerce::nullable($data['sort'] ?? null, static fn (mixed $value): ResourceReportSort => ResourceReportSort::fromArray(Coerce::toArray($value))),
            cost: Coerce::toArrayOrNull($data['cost'] ?? null),
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
            'columns' => array_map(static fn (ResourceReportColumn $item): array => $item->toArray(), $this->columns),
            'rows' => array_map(static fn (ResourceReportRow $item): array => $item->toArray(), $this->rows),
            'total' => $this->total,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'truncated' => $this->truncated,
            'sort' => $this->sort?->toArray(),
            'cost' => $this->cost,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
