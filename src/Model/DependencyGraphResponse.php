<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class DependencyGraphResponse implements \JsonSerializable
{
    /**
     * @param list<DependencyGraphNode> $nodes Org resources that participate in at least one edge.
     * @param list<DependencyGraphEdge> $edges Directed depends-on edges (consumer → provider), deduped per consumer field and provider.
     * @param bool $truncated True when inference hit its edge cap and the returned graph is a partial view of the org.
     */
    public function __construct(
        public readonly array $nodes,
        public readonly array $edges,
        public readonly bool $truncated,
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
            nodes: Coerce::mapList($data['nodes'] ?? null, static fn (mixed $item): DependencyGraphNode => DependencyGraphNode::fromArray(Coerce::toArray($item))),
            edges: Coerce::mapList($data['edges'] ?? null, static fn (mixed $item): DependencyGraphEdge => DependencyGraphEdge::fromArray(Coerce::toArray($item))),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'nodes' => array_map(static fn (DependencyGraphNode $item): array => $item->toArray(), $this->nodes),
            'edges' => array_map(static fn (DependencyGraphEdge $item): array => $item->toArray(), $this->edges),
            'truncated' => $this->truncated,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
