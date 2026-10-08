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

final class CostCanvasTableQuery implements \JsonSerializable
{
    /**
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string} $dateRange
     * @param 'none'|'daily'|'weekly'|'monthly' $binning
     * @param 'provider'|'account'|'service'|'region'|'resource'|'tag'|'charge_type'|'commitment' $groupBy
     * @param list<CostReportFilter>|null $filters
     * @param 'cash'|'amortized'|'blended'|null $costBasis
     */
    public function __construct(
        public readonly array $dateRange,
        public readonly string $binning,
        public readonly string $groupBy,
        public readonly ?string $groupByTagKey = null,
        public readonly ?array $filters = null,
        public readonly ?string $savedFilterId = null,
        public readonly ?string $costBasis = null,
        public readonly ?bool $adjusted = null,
        public readonly ?int $topN = null,
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
            dateRange: $data['dateRange'] ?? null,
            binning: Coerce::toString($data['binning'] ?? null),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostReportFilter => CostReportFilter::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
            adjusted: Coerce::toBoolOrNull($data['adjusted'] ?? null),
            topN: Coerce::toIntOrNull($data['topN'] ?? null),
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
            'dateRange' => $this->dateRange,
            'binning' => $this->binning,
            'groupBy' => $this->groupBy,
        ];
        if ($this->groupByTagKey !== null) {
            $payload['groupByTagKey'] = $this->groupByTagKey;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (CostReportFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }
        if ($this->adjusted !== null) {
            $payload['adjusted'] = $this->adjusted;
        }
        if ($this->topN !== null) {
            $payload['topN'] = $this->topN;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
