<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

/**
 * A saved view over the savings findings list. Per-object sharing is not carried; a view an apply
 * creates is owned by the applying user.
 */
final class OrgConfigSavingsView implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param 'open'|'ready'|'in_progress'|'completed'|'archived'|'all' $status
     * @param array<string, mixed> $filter
     * @param array{field: 'savings'|'detected'|'name'|'status_changed', direction: 'asc'|'desc'} $sort
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $status,
        public readonly array $filter,
        public readonly array $sort,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            filter: Coerce::toArray($data['filter'] ?? null),
            sort: Coerce::toArray($data['sort'] ?? null),
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
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'filter' => $this->filter,
            'sort' => $this->sort,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
