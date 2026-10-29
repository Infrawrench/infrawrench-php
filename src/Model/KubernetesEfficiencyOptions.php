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

final class KubernetesEfficiencyOptions implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string}> $clusters
     * @param list<string> $regions
     * @param list<string> $namespaces
     * @param list<string> $nodePools
     * @param list<array{group: 'tag'|'k8s'|'k8s_pod_label'|'k8s_node_label'|'k8s_pvc_label', keys: list<array{key: string, group: 'tag'|'k8s'|'k8s_pod_label'|'k8s_node_label'|'k8s_pvc_label', name: string}>}> $labelKeys
     */
    public function __construct(
        public readonly array $clusters,
        public readonly array $regions,
        public readonly array $namespaces,
        public readonly array $nodePools,
        public readonly array $labelKeys,
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
            clusters: Coerce::mapList($data['clusters'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            namespaces: Coerce::mapList($data['namespaces'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            nodePools: Coerce::mapList($data['nodePools'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            labelKeys: Coerce::mapList($data['labelKeys'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'clusters' => $this->clusters,
            'regions' => $this->regions,
            'namespaces' => $this->namespaces,
            'nodePools' => $this->nodePools,
            'labelKeys' => $this->labelKeys,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
