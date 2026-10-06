<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class KubernetesNetworkReport implements \JsonSerializable
{
    /**
     * @param array{from: string, to: string} $range
     * @param array{bytes: float, estimatedCost: float, allocatedCost: float|null, unallocatedCost: float|null} $totals
     * @param array{query: string|null, error: string|null, billedCost: float|null, basis: 'cost'|'bytes'|'none', scaledDays: int, daysWithoutBilled: int} $billed
     * @param list<array{scope: string, bytes: float, estimatedCost: float, allocatedCost: float|null}> $scopes
     * @param list<array{method: 'flow_log'|'in_cluster_flows'|'counter_estimate'|'', bytes: float}> $methods
     * @param list<KubernetesNetworkRow> $namespaces
     * @param list<KubernetesNetworkRow> $workloads
     * @param list<NetworkFlowPair> $topTalkers
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly array $range,
        public readonly bool $estimated,
        public readonly string $currency,
        public readonly array $totals,
        public readonly array $billed,
        public readonly array $scopes,
        public readonly array $methods,
        public readonly array $namespaces,
        public readonly array $workloads,
        public readonly array $topTalkers,
        public readonly ?NetworkFlowAccountStatus $collection,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            range: Coerce::toArray($data['range'] ?? null),
            estimated: Coerce::toBool($data['estimated'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            totals: Coerce::toArray($data['totals'] ?? null),
            billed: Coerce::toArray($data['billed'] ?? null),
            scopes: Coerce::mapList($data['scopes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            methods: Coerce::mapList($data['methods'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            namespaces: Coerce::mapList($data['namespaces'] ?? null, static fn (mixed $item): KubernetesNetworkRow => KubernetesNetworkRow::fromArray(Coerce::toArray($item))),
            workloads: Coerce::mapList($data['workloads'] ?? null, static fn (mixed $item): KubernetesNetworkRow => KubernetesNetworkRow::fromArray(Coerce::toArray($item))),
            topTalkers: Coerce::mapList($data['topTalkers'] ?? null, static fn (mixed $item): NetworkFlowPair => NetworkFlowPair::fromArray(Coerce::toArray($item))),
            collection: Coerce::nullable($data['collection'] ?? null, static fn (mixed $value): NetworkFlowAccountStatus => NetworkFlowAccountStatus::fromArray(Coerce::toArray($value))),
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
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'range' => $this->range,
            'estimated' => $this->estimated,
            'currency' => $this->currency,
            'totals' => $this->totals,
            'billed' => $this->billed,
            'scopes' => $this->scopes,
            'methods' => $this->methods,
            'namespaces' => array_map(static fn (KubernetesNetworkRow $item): array => $item->toArray(), $this->namespaces),
            'workloads' => array_map(static fn (KubernetesNetworkRow $item): array => $item->toArray(), $this->workloads),
            'topTalkers' => array_map(static fn (NetworkFlowPair $item): array => $item->toArray(), $this->topTalkers),
            'collection' => $this->collection?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
