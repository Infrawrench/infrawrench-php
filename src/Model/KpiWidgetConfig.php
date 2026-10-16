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

final class KpiWidgetConfig implements \JsonSerializable
{
    /**
     * @param array{kind: 'cost_report', reportId: string, measure: 'cost'|'usage'|'count'|'unit_cost'|'business_metric', aggregation: 'sum'|'daily_average', usageUnit?: string}|array{kind: 'budget', budgetId: string, measure: 'actual'|'forecast'|'remaining'|'percent_used'}|array{kind: 'commitments', measure: 'coverage'|'utilization'|'savings'}|array{kind: 'realized_savings', eventKind?: 'rightsizing'|'orphan_deletion'|'sleep_schedule'|'commitment'|'saas_seat'|'manual'} $source
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string}|null $dateRange
     * @param bool|null $upIsGood Which direction the change badge colours as good; absent derives it.
     */
    public function __construct(
        public readonly float $version,
        public readonly array $source,
        public readonly bool $comparePreviousPeriod,
        public readonly ?array $dateRange = null,
        public readonly ?bool $upIsGood = null,
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
            source: $data['source'] ?? null,
            comparePreviousPeriod: Coerce::toBool($data['comparePreviousPeriod'] ?? null),
            dateRange: $data['dateRange'] ?? null,
            upIsGood: Coerce::toBoolOrNull($data['upIsGood'] ?? null),
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
            'version' => $this->version,
            'source' => $this->source,
            'comparePreviousPeriod' => $this->comparePreviousPeriod,
        ];
        if ($this->dateRange !== null) {
            $payload['dateRange'] = $this->dateRange;
        }
        if ($this->upIsGood !== null) {
            $payload['upIsGood'] = $this->upIsGood;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
