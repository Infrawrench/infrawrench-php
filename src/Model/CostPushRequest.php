<?php

/*
 * infrawrench/sdk v0.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.35.0).
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

final class CostPushRequest implements \JsonSerializable
{
    /**
     * @param string $source Stable slug naming the system that owns these rows: letters, digits, `.`, `_` and `-`. It groups the rows under an `External` provider and an `external:<source>` account, and re-pushing the same source over the same days restates only its own rows.
     * @param list<PushedCostRow> $rows
     */
    public function __construct(
        public readonly string $source,
        public readonly array $rows,
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
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): PushedCostRow => PushedCostRow::fromArray(Coerce::toArray($item))),
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
            'rows' => array_map(static fn (PushedCostRow $item): array => $item->toArray(), $this->rows),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
