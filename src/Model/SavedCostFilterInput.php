<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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

final class SavedCostFilterInput implements \JsonSerializable
{
    /**
     * @param list<SavedCostFilterTerm>|null $filters The structured filter. May be omitted only when `query` is sent instead.
     * @param string|null $query The same filter written in the cost query language — an alternative spelling of `filters`, compiled server-side into exactly that structure. Sending both a query and a non-empty `filters` is a 400, not a precedence rule. Whichever spelling is used, the result must be non-empty (an empty saved filter matches everything, which is the same as no filter wearing a name) and every tag term must carry its key.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?array $filters = null,
        public readonly ?string $query = null,
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
            description: Coerce::toStringOrNull($data['description'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): SavedCostFilterTerm => SavedCostFilterTerm::fromArray(Coerce::toArray($item)))),
            query: Coerce::toStringOrNull($data['query'] ?? null),
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
            'name' => $this->name,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (SavedCostFilterTerm $item): array => $item->toArray(), $this->filters);
        }
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
