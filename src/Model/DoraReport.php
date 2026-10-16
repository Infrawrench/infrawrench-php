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

final class DoraReport implements \JsonSerializable
{
    /**
     * @param 'day'|'week' $bucket
     * @param list<array{start: string, deploys: int, changes: int, failures: int, restores: int, leadTimeMedianHours: float|null, changeFailureRate: float|null, restoreMedianHours: float|null}> $trend
     * @param list<array{key: string|null, label: string, summary: array<string, mixed>}> $breakdown The four metrics per value of `groupBy`, busiest first, at most 25 rows.
     * @param list<array{id: string, label: string}> $dimensions Scope dimensions this server knows: environment, repository, owner, and any added.
     * @param int $eventCount Deploy events of any environment in the window.
     * @param array<string, list<DoraScopeValue>> $scopeValues Every value each dimension took in the window: what a scope picker offers.
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $bucket,
        public readonly ?DoraScopeFilter $filter,
        public readonly string $groupBy,
        public readonly DoraSummary $summary,
        public readonly DoraSummary $previous,
        public readonly array $trend,
        public readonly array $breakdown,
        public readonly array $dimensions,
        public readonly DoraSettings $settings,
        public readonly int $eventCount,
        public readonly array $scopeValues,
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
            bucket: Coerce::toString($data['bucket'] ?? null),
            filter: Coerce::nullable($data['filter'] ?? null, static fn (mixed $value): DoraScopeFilter => DoraScopeFilter::fromArray(Coerce::toArray($value))),
            groupBy: Coerce::toString($data['groupBy'] ?? null),
            summary: DoraSummary::fromArray(Coerce::toArray($data['summary'] ?? null)),
            previous: DoraSummary::fromArray(Coerce::toArray($data['previous'] ?? null)),
            trend: Coerce::mapList($data['trend'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            breakdown: Coerce::mapList($data['breakdown'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            dimensions: Coerce::mapList($data['dimensions'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            settings: DoraSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
            eventCount: Coerce::toInt($data['eventCount'] ?? null),
            scopeValues: Coerce::mapValues($data['scopeValues'] ?? null, static fn (mixed $item): array => Coerce::mapList($item, static fn (mixed $item): DoraScopeValue => DoraScopeValue::fromArray(Coerce::toArray($item)))),
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
            'bucket' => $this->bucket,
            'filter' => $this->filter?->toArray(),
            'groupBy' => $this->groupBy,
            'summary' => $this->summary->toArray(),
            'previous' => $this->previous->toArray(),
            'trend' => $this->trend,
            'breakdown' => $this->breakdown,
            'dimensions' => $this->dimensions,
            'settings' => $this->settings->toArray(),
            'eventCount' => $this->eventCount,
            'scopeValues' => array_map(static fn (array $item): array => array_map(static fn (DoraScopeValue $item): array => $item->toArray(), $item), $this->scopeValues),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
