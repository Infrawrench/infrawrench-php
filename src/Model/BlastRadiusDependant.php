<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class BlastRadiusDependant implements \JsonSerializable
{
    /**
     * @param int $depth Shortest hop count from the resource: 1 is a direct dependant, 2 or more reached it through something else. The resource itself is never listed.
     * @param array{fieldKey: string, outputKey: string, kind?: 'output-ref'|'declared'|'containment'|'field-match', label?: string}|null $via How a direct dependant reaches the resource. Absent for transitive dependants, whose path is several edges and has no single caption.
     */
    public function __construct(
        public readonly ?BlastRadiusNode $node,
        public readonly int $depth,
        public readonly ?array $via = null,
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
            node: Coerce::nullable($data['node'] ?? null, static fn (mixed $value): BlastRadiusNode => BlastRadiusNode::fromArray(Coerce::toArray($value))),
            depth: Coerce::toInt($data['depth'] ?? null),
            via: Coerce::toArrayOrNull($data['via'] ?? null),
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
            'node' => $this->node?->toArray(),
            'depth' => $this->depth,
        ];
        if ($this->via !== null) {
            $payload['via'] = $this->via;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
