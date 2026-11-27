<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class MigrationRowOverride implements \JsonSerializable
{
    /**
     * @param string|null $resourceTypeId Target resource type, of the row's category.
     * @param string|null $sizeId Target size: a catalog SKU or size-picker id.
     */
    public function __construct(
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $sizeId = null,
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
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            sizeId: Coerce::toStringOrNull($data['sizeId'] ?? null),
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
        ];
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->sizeId !== null) {
            $payload['sizeId'] = $this->sizeId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
