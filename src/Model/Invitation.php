<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class Invitation implements \JsonSerializable
{
    /** @param OrganizationRole::* $role */
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly string $role,
        public readonly ?string $roleId,
        public readonly ?string $roleName,
        public readonly ?string $acceptedAt,
        public readonly string $expiresAt,
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
            email: Coerce::toString($data['email'] ?? null),
            role: Coerce::toString($data['role'] ?? null),
            roleId: Coerce::toStringOrNull($data['roleId'] ?? null),
            roleName: Coerce::toStringOrNull($data['roleName'] ?? null),
            acceptedAt: Coerce::toStringOrNull($data['acceptedAt'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
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
            'email' => $this->email,
            'role' => $this->role,
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
            'acceptedAt' => $this->acceptedAt,
            'expiresAt' => $this->expiresAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
