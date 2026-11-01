<?php

/*
 * infrawrench/sdk v1.86.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.86.0).
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

final class AwsPricingQueryResult implements \JsonSerializable
{
    /**
     * @param list<AwsPricingResultColumn> $columns
     * @param list<list<string|float|bool|null>> $rows Each row's values, in `columns` order.
     * @param bool $truncated More rows matched than `maxRows`; add a LIMIT or aggregate to see them all.
     */
    public function __construct(
        public readonly array $columns,
        public readonly array $rows,
        public readonly bool $truncated,
        public readonly int $elapsedMs,
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
            columns: Coerce::mapList($data['columns'] ?? null, static fn (mixed $item): AwsPricingResultColumn => AwsPricingResultColumn::fromArray(Coerce::toArray($item))),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): array => Coerce::toList($item)),
            truncated: Coerce::toBool($data['truncated'] ?? null),
            elapsedMs: Coerce::toInt($data['elapsedMs'] ?? null),
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
            'columns' => array_map(static fn (AwsPricingResultColumn $item): array => $item->toArray(), $this->columns),
            'rows' => $this->rows,
            'truncated' => $this->truncated,
            'elapsedMs' => $this->elapsedMs,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
