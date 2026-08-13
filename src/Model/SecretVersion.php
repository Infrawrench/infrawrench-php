<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class SecretVersion implements \JsonSerializable
{
    /**
     * @param 'enabled'|'disabled'|'destroyed' $state
     * @param string $createdAt ISO-8601.
     * @param string|null $destroyedAt Set only when destroyed.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $state,
        public readonly string $createdAt,
        public readonly ?string $destroyedAt = null,
        public readonly ?bool $isLatest = null,
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
            state: Coerce::toString($data['state'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            destroyedAt: Coerce::toStringOrNull($data['destroyedAt'] ?? null),
            isLatest: Coerce::toBoolOrNull($data['isLatest'] ?? null),
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
            'id' => $this->id,
            'state' => $this->state,
            'createdAt' => $this->createdAt,
        ];
        if ($this->destroyedAt !== null) {
            $payload['destroyedAt'] = $this->destroyedAt;
        }
        if ($this->isLatest !== null) {
            $payload['isLatest'] = $this->isLatest;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
