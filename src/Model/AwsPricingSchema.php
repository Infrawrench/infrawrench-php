<?php

/*
 * infrawrench/sdk v1.88.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.88.0).
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

final class AwsPricingSchema implements \JsonSerializable
{
    /**
     * @param list<AwsPricingSchemaTable> $tables
     * @param list<string> $notes Conventions a correct query depends on.
     * @param list<AwsPricingSource>|null $sources How fresh each bundle is; null when the warehouse could not be reached.
     */
    public function __construct(
        public readonly array $tables,
        public readonly array $notes,
        public readonly ?array $sources,
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
            tables: Coerce::mapList($data['tables'] ?? null, static fn (mixed $item): AwsPricingSchemaTable => AwsPricingSchemaTable::fromArray(Coerce::toArray($item))),
            notes: Coerce::mapList($data['notes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sources: Coerce::nullable($data['sources'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): AwsPricingSource => AwsPricingSource::fromArray(Coerce::toArray($item)))),
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
            'tables' => array_map(static fn (AwsPricingSchemaTable $item): array => $item->toArray(), $this->tables),
            'notes' => $this->notes,
            'sources' => $this->sources === null ? null : array_map(static fn (AwsPricingSource $item): array => $item->toArray(), $this->sources),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
