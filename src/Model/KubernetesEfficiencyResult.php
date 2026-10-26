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

final class KubernetesEfficiencyResult implements \JsonSerializable
{
    /**
     * @param 'day'|'week'|'month' $granularity
     * @param 'cluster'|'namespace'|'workload'|'label'|'node_pool'|'category' $groupBy
     * @param 'separate'|'spread' $idle
     * @param 'total'|'allocated' $basis
     * @param list<string> $buckets
     * @param list<array<string, mixed>> $currencies
     * @param bool $includesLegacyRows Some rows predate the resource and usage tags (reported as `compute`, unmeasured).
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly string $granularity,
        public readonly string $groupBy,
        public readonly string $idle,
        public readonly string $basis,
        public readonly array $buckets,
        public readonly array $currencies,
        public readonly bool $includesLegacyRows,
        public readonly ?string $groupByLabelKey = null,
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
            idle: Coerce::toString($data['idle'] ?? null),
            basis: Coerce::toString($data['basis'] ?? null),
            buckets: Coerce::mapList($data['buckets'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            includesLegacyRows: Coerce::toBool($data['includesLegacyRows'] ?? null),
            groupByLabelKey: Coerce::toStringOrNull($data['groupByLabelKey'] ?? null),
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
            'granularity' => $this->granularity,
            'groupBy' => $this->groupBy,
            'idle' => $this->idle,
            'basis' => $this->basis,
            'buckets' => $this->buckets,
            'currencies' => $this->currencies,
            'includesLegacyRows' => $this->includesLegacyRows,
        ];
        if ($this->groupByLabelKey !== null) {
            $payload['groupByLabelKey'] = $this->groupByLabelKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
