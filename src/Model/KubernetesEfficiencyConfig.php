<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class KubernetesEfficiencyConfig implements \JsonSerializable
{
    /**
     * @param array{kind: 'relative', preset: string}|array{kind: 'absolute', from: string, to: string} $dateRange
     * @param 'day'|'week'|'month' $granularity
     * @param list<KubernetesEfficiencyFilter> $filters
     * @param 'cluster'|'namespace'|'workload'|'label'|'node_pool'|'category' $groupBy
     * @param 'separate'|'spread' $idle `separate` keeps idle capacity and cluster overhead as their own rows; `spread` shares them across each cluster's groups, per period, in proportion to what each was allocated.
     * @param 'total'|'allocated' $basis Efficiency denominator. `total`: used / (total - unmeasured), so idle and overhead count against it. `allocated`: used / (used + unused), what workloads reserved only.
     * @param string|null $groupByLabelKey The tag key to group by; required exactly when `groupBy` is `label`.
     * @param list<KubernetesCostCategory::*>|null $categories Cost categories to include. Absent or empty is every category.
     */
    public function __construct(
        public readonly float $version,
        public readonly array $dateRange,
        public readonly string $granularity,
        public readonly array $filters,
        public readonly string $groupBy,
        public readonly string $idle,
        public readonly string $basis,
        public readonly ?string $groupByLabelKey = null,
        public readonly ?array $categories = null,
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
            dateRange: $data['dateRange'] ?? null,
            granularity: Coerce::toString($data['granularity'] ?? null),
            filters: Coerce::mapList($data['filters'] ?? null, static fn (mixed $item): KubernetesEfficiencyFilter => KubernetesEfficiencyFilter::fromArray(Coerce::toArray($item))),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            idle: Coerce::toString($data['idle'] ?? null),
            basis: Coerce::toString($data['basis'] ?? null),
            groupByLabelKey: Coerce::toStringOrNull($data['groupByLabelKey'] ?? null),
            categories: Coerce::nullable($data['categories'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'dateRange' => $this->dateRange,
            'granularity' => $this->granularity,
            'filters' => array_map(static fn (KubernetesEfficiencyFilter $item): array => $item->toArray(), $this->filters),
            'groupBy' => $this->groupBy,
            'idle' => $this->idle,
            'basis' => $this->basis,
        ];
        if ($this->groupByLabelKey !== null) {
            $payload['groupByLabelKey'] = $this->groupByLabelKey;
        }
        if ($this->categories !== null) {
            $payload['categories'] = $this->categories;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
