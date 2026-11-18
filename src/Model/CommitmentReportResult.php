<?php

/*
 * infrawrench/sdk v1.120.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.120.0).
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

final class CommitmentReportResult implements \JsonSerializable
{
    /**
     * @param string $from First day of the resolved window.
     * @param string $to Last day of the resolved window; never past today.
     * @param CommitmentReportGranularity::* $granularity
     * @param CommitmentReportGroupBy::* $groupBy
     * @param list<string> $buckets Every bucket start in the window, gaps included, ascending.
     * @param list<CommitmentReportSeries> $series One per group and currency, largest commitment cost first.
     * @param list<CommitmentReportSeries> $overall All groups combined, one series per currency.
     * @param list<CommitmentReportProvider> $providers
     * @param list<CommitmentReportNotice::*> $notices
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $granularity,
        public readonly string $groupBy,
        public readonly array $buckets,
        public readonly array $series,
        public readonly array $overall,
        public readonly array $providers,
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
            buckets: Coerce::mapList($data['buckets'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            series: Coerce::mapList($data['series'] ?? null, static fn (mixed $item): CommitmentReportSeries => CommitmentReportSeries::fromArray(Coerce::toArray($item))),
            overall: Coerce::mapList($data['overall'] ?? null, static fn (mixed $item): CommitmentReportSeries => CommitmentReportSeries::fromArray(Coerce::toArray($item))),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): CommitmentReportProvider => CommitmentReportProvider::fromArray(Coerce::toArray($item))),
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
            'buckets' => $this->buckets,
            'series' => array_map(static fn (CommitmentReportSeries $item): array => $item->toArray(), $this->series),
            'overall' => array_map(static fn (CommitmentReportSeries $item): array => $item->toArray(), $this->overall),
            'providers' => array_map(static fn (CommitmentReportProvider $item): array => $item->toArray(), $this->providers),
            'notices' => $this->notices,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
