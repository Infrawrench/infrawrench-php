<?php

/*
 * infrawrench/sdk v1.95.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.95.0).
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

final class AwsPricingSchemaTable implements \JsonSerializable
{
    /**
     * @param list<string> $sortingKey Filtering on a prefix of these columns is what makes a query fast.
     * @param list<AwsPricingSchemaColumn> $columns
     */
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly array $sortingKey,
        public readonly array $columns,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            sortingKey: Coerce::mapList($data['sortingKey'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            columns: Coerce::mapList($data['columns'] ?? null, static fn (mixed $item): AwsPricingSchemaColumn => AwsPricingSchemaColumn::fromArray(Coerce::toArray($item))),
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
            'name' => $this->name,
            'description' => $this->description,
            'sortingKey' => $this->sortingKey,
            'columns' => array_map(static fn (AwsPricingSchemaColumn $item): array => $item->toArray(), $this->columns),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
