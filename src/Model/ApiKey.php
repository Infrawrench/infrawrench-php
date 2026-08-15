<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class ApiKey implements \JsonSerializable
{
    /**
     * @param list<Permission::*> $scopes
     * @param string|null $legacyHashSunsetAt Cutover date past which a key still on the legacy SHA-256 hash will be refused. Null once rehashed to HMAC.
     * @param bool $needsRotation True when this key is still hashed with the legacy SHA-256 scheme and should be rotated before `legacyHashSunsetAt`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $prefix,
        public readonly array $scopes,
        public readonly ?string $lastUsedAt,
        public readonly ?string $expiresAt,
        public readonly ?string $revokedAt,
        public readonly ?string $legacyHashSunsetAt,
        public readonly bool $needsRotation,
        public readonly string $createdAt,
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
            prefix: Coerce::toString($data['prefix'] ?? null),
            scopes: Coerce::mapList($data['scopes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            lastUsedAt: Coerce::toStringOrNull($data['lastUsedAt'] ?? null),
            expiresAt: Coerce::toStringOrNull($data['expiresAt'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            legacyHashSunsetAt: Coerce::toStringOrNull($data['legacyHashSunsetAt'] ?? null),
            needsRotation: Coerce::toBool($data['needsRotation'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'prefix' => $this->prefix,
            'scopes' => $this->scopes,
            'lastUsedAt' => $this->lastUsedAt,
            'expiresAt' => $this->expiresAt,
            'revokedAt' => $this->revokedAt,
            'legacyHashSunsetAt' => $this->legacyHashSunsetAt,
            'needsRotation' => $this->needsRotation,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
