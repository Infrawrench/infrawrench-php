<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class DashboardFull implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $name,
        public readonly bool $isDefault,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $deletedAt,
        public readonly int $syncVersion,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            isDefault: Coerce::toBool($data['isDefault'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            deletedAt: Coerce::toStringOrNull($data['deletedAt'] ?? null),
            syncVersion: Coerce::toInt($data['syncVersion'] ?? null),
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
            'organizationId' => $this->organizationId,
            'name' => $this->name,
            'isDefault' => $this->isDefault,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
            'syncVersion' => $this->syncVersion,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
