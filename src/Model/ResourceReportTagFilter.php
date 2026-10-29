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

final class ResourceReportTagFilter implements \JsonSerializable
{
    /**
     * @param 'tag'|'virtual_tag' $source Provider tags (from the resource) or virtual tags (from its cost rows).
     * @param 'in'|'not_in'|'exists'|'missing' $op `exists` and `missing` take no values; `in` and `not_in` need at least one.
     * @param list<string> $values
     */
    public function __construct(
        public readonly string $source,
        public readonly string $key,
        public readonly string $op,
        public readonly array $values,
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
            source: Coerce::toString($data['source'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            op: Coerce::toString($data['op'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'source' => $this->source,
            'key' => $this->key,
            'op' => $this->op,
            'values' => $this->values,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
