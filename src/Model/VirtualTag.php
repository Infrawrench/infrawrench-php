<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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

final class VirtualTag implements \JsonSerializable
{
    /**
     * @param list<VirtualTagRule> $rules
     * @param array{state: 'pending'|'processing'|'ready'|'failed', processedAt: string|null, error: string|null, stats: array<string, mixed>|null} $status The background evaluation over stored history. Queries never wait on it: a saved rule applies to every read immediately; this is the account of what the rules do.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $key,
        public readonly string $name,
        public readonly ?string $description,
        public readonly ?string $defaultValue,
        public readonly array $rules,
        public readonly array $status,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            defaultValue: Coerce::toStringOrNull($data['defaultValue'] ?? null),
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): VirtualTagRule => VirtualTagRule::fromArray(Coerce::toArray($item))),
            status: Coerce::toArray($data['status'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'description' => $this->description,
            'defaultValue' => $this->defaultValue,
            'rules' => array_map(static fn (VirtualTagRule $item): array => $item->toArray(), $this->rules),
            'status' => $this->status,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
