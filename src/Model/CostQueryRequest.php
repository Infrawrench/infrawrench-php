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

final class CostQueryRequest implements \JsonSerializable
{
    /**
     * @param 'daily'|'weekly'|'monthly'|'cumulative' $binning
     * @param 'none'|'provider'|'account'|'service'|'region'|'resource'|'tag' $groupBy
     * @param list<CostFilter>|null $filters
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $binning,
        public readonly string $groupBy,
        public readonly ?string $groupByTagKey = null,
        public readonly ?array $filters = null,
        public readonly ?int $topN = null,
        public readonly ?bool $comparePreviousPeriod = null,
        public readonly ?bool $forecast = null,
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
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            binning: Coerce::toString($data['binning'] ?? null),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostFilter => CostFilter::fromArray(Coerce::toArray($item)))),
            topN: Coerce::toIntOrNull($data['topN'] ?? null),
            comparePreviousPeriod: Coerce::toBoolOrNull($data['comparePreviousPeriod'] ?? null),
            forecast: Coerce::toBoolOrNull($data['forecast'] ?? null),
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
            'from' => $this->from,
            'to' => $this->to,
            'binning' => $this->binning,
            'groupBy' => $this->groupBy,
        ];
        if ($this->groupByTagKey !== null) {
            $payload['groupByTagKey'] = $this->groupByTagKey;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (CostFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->topN !== null) {
            $payload['topN'] = $this->topN;
        }
        if ($this->comparePreviousPeriod !== null) {
            $payload['comparePreviousPeriod'] = $this->comparePreviousPeriod;
        }
        if ($this->forecast !== null) {
            $payload['forecast'] = $this->forecast;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
