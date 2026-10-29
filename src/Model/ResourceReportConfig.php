<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ResourceReportConfig implements \JsonSerializable
{
    /**
     * @param list<string> $columns Shown columns, in display order.
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string} $costRange
     * @param CostBasis::* $costBasis
     */
    public function __construct(
        public readonly float $version,
        public readonly ResourceReportFilters $filters,
        public readonly array $columns,
        public readonly ?ResourceReportSort $sort,
        public readonly array $costRange,
        public readonly string $costBasis,
        public readonly int $pageSize,
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
            version: Coerce::toFloat($data['version'] ?? null),
            filters: ResourceReportFilters::fromArray(Coerce::toArray($data['filters'] ?? null)),
            columns: Coerce::mapList($data['columns'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sort: Coerce::nullable($data['sort'] ?? null, static fn (mixed $value): ResourceReportSort => ResourceReportSort::fromArray(Coerce::toArray($value))),
            costRange: $data['costRange'] ?? null,
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            pageSize: Coerce::toInt($data['pageSize'] ?? null),
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
            'version' => $this->version,
            'filters' => $this->filters->toArray(),
            'columns' => $this->columns,
            'sort' => $this->sort?->toArray(),
            'costRange' => $this->costRange,
            'costBasis' => $this->costBasis,
            'pageSize' => $this->pageSize,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
