<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class KubernetesNetworkRow implements \JsonSerializable
{
    /**
     * @param 'workload'|'namespace'|'node'|'truncated' $kind
     * @param float $estimatedCost Bytes × the published rate for each boundary crossed.
     * @param float|null $allocatedCost This row's share of the cluster's billed data transfer. Null when no billed source is configured. The rows never add up to more than was billed.
     * @param array<string, float> $byScope Bytes by boundary.
     * @param 'flow_log'|'in_cluster_flows'|'counter_estimate'|'' $method How the bytes and boundary were established, strongest first: `flow_log` (the cloud's VPC flow log for the node, split across its pods by their counters), `in_cluster_flows` (Cilium Hubble named the peers; the boundary follows from where they run), `counter_estimate` (the kubelet's per-pod byte counter alone, no destination, boundary unknown). Empty for residual rows.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly string $namespace,
        public readonly string $kind,
        public readonly float $bytes,
        public readonly float $estimatedCost,
        public readonly ?float $allocatedCost,
        public readonly array $byScope,
        public readonly string $method,
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
            key: Coerce::toString($data['key'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            namespace: Coerce::toString($data['namespace'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            bytes: Coerce::toFloat($data['bytes'] ?? null),
            estimatedCost: Coerce::toFloat($data['estimatedCost'] ?? null),
            allocatedCost: Coerce::toFloatOrNull($data['allocatedCost'] ?? null),
            byScope: Coerce::mapValues($data['byScope'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            method: Coerce::toString($data['method'] ?? null),
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
            'key' => $this->key,
            'label' => $this->label,
            'namespace' => $this->namespace,
            'kind' => $this->kind,
            'bytes' => $this->bytes,
            'estimatedCost' => $this->estimatedCost,
            'allocatedCost' => $this->allocatedCost,
            'byScope' => $this->byScope,
            'method' => $this->method,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
