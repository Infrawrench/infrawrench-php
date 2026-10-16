<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class Dashboard implements \JsonSerializable
{
    /**
     * @param bool $isDefault The organization default: the final fallback, never deletable.
     * @param bool $isResolvedDefault The dashboard the caller lands on: their own default, else their role's, else the organization default. Exactly one listed dashboard has it, unless sharing hides it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly bool $isDefault,
        public readonly bool $isResolvedDefault,
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
            name: Coerce::toString($data['name'] ?? null),
            isDefault: Coerce::toBool($data['isDefault'] ?? null),
            isResolvedDefault: Coerce::toBool($data['isResolvedDefault'] ?? null),
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
            'name' => $this->name,
            'isDefault' => $this->isDefault,
            'isResolvedDefault' => $this->isResolvedDefault,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
