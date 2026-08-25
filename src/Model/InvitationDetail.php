<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class InvitationDetail implements \JsonSerializable
{
    /** @param OrganizationRole::* $role */
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly string $role,
        public readonly string $expiresAt,
        public readonly ?string $acceptedAt,
        public readonly string $organizationId,
        public readonly string $organizationName,
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
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            acceptedAt: Coerce::toStringOrNull($data['acceptedAt'] ?? null),
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            organizationName: Coerce::toString($data['organizationName'] ?? null),
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
            'expiresAt' => $this->expiresAt,
            'acceptedAt' => $this->acceptedAt,
            'organizationId' => $this->organizationId,
            'organizationName' => $this->organizationName,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
