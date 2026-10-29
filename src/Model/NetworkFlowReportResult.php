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

final class NetworkFlowReportResult implements \JsonSerializable
{
    /**
     * @param NetworkFlowReportGranularity::* $granularity
     * @param NetworkFlowReportGroupBy::* $groupBy
     * @param NetworkFlowReportMetric::* $metric
     * @param list<string> $buckets
     * @param list<NetworkFlowReportSeries> $series The chart: the largest groups, then one `__other__` series per currency, so the stack adds up to `overall`. Empty when `groupBy` is `none`.
     * @param list<NetworkFlowReportSeries> $overall All groups combined, one series per currency.
     * @param list<NetworkFlowReportGroupTotal> $groups Per-group totals, largest first, up to `topN`.
     * @param int $groupCount How many groups there were before the `topN` cut.
     * @param list<NetworkFlowReportTalker> $topTalkers
     * @param list<string> $sampledPluginIds
     * @param list<NetworkFlowReportNotice::*> $notices
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $granularity,
        public readonly string $groupBy,
        public readonly string $metric,
        public readonly bool $estimated,
        public readonly array $buckets,
        public readonly array $series,
        public readonly array $overall,
        public readonly array $groups,
        public readonly int $groupCount,
        public readonly array $topTalkers,
        public readonly array $sampledPluginIds,
        public readonly array $notices,
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
            granularity: Coerce::toString($data['granularity'] ?? null),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            metric: Coerce::toString($data['metric'] ?? null),
            estimated: Coerce::toBool($data['estimated'] ?? null),
            buckets: Coerce::mapList($data['buckets'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            series: Coerce::mapList($data['series'] ?? null, static fn (mixed $item): NetworkFlowReportSeries => NetworkFlowReportSeries::fromArray(Coerce::toArray($item))),
            overall: Coerce::mapList($data['overall'] ?? null, static fn (mixed $item): NetworkFlowReportSeries => NetworkFlowReportSeries::fromArray(Coerce::toArray($item))),
            groups: Coerce::mapList($data['groups'] ?? null, static fn (mixed $item): NetworkFlowReportGroupTotal => NetworkFlowReportGroupTotal::fromArray(Coerce::toArray($item))),
            groupCount: Coerce::toInt($data['groupCount'] ?? null),
            topTalkers: Coerce::mapList($data['topTalkers'] ?? null, static fn (mixed $item): NetworkFlowReportTalker => NetworkFlowReportTalker::fromArray(Coerce::toArray($item))),
            sampledPluginIds: Coerce::mapList($data['sampledPluginIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            notices: Coerce::mapList($data['notices'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'from' => $this->from,
            'to' => $this->to,
            'granularity' => $this->granularity,
            'groupBy' => $this->groupBy,
            'metric' => $this->metric,
            'estimated' => $this->estimated,
            'buckets' => $this->buckets,
            'series' => array_map(static fn (NetworkFlowReportSeries $item): array => $item->toArray(), $this->series),
            'overall' => array_map(static fn (NetworkFlowReportSeries $item): array => $item->toArray(), $this->overall),
            'groups' => array_map(static fn (NetworkFlowReportGroupTotal $item): array => $item->toArray(), $this->groups),
            'groupCount' => $this->groupCount,
            'topTalkers' => array_map(static fn (NetworkFlowReportTalker $item): array => $item->toArray(), $this->topTalkers),
            'sampledPluginIds' => $this->sampledPluginIds,
            'notices' => $this->notices,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
