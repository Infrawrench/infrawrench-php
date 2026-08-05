<?php

/*
 * infrawrench/sdk v0.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.35.0).
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

final class ProfileSummary implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly bool $emailVerified,
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $profilePictureUrl,
        public readonly ?string $lastSignInAt,
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
            emailVerified: Coerce::toBool($data['emailVerified'] ?? null),
            firstName: Coerce::toStringOrNull($data['firstName'] ?? null),
            lastName: Coerce::toStringOrNull($data['lastName'] ?? null),
            profilePictureUrl: Coerce::toStringOrNull($data['profilePictureUrl'] ?? null),
            lastSignInAt: Coerce::toStringOrNull($data['lastSignInAt'] ?? null),
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
            'emailVerified' => $this->emailVerified,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'profilePictureUrl' => $this->profilePictureUrl,
            'lastSignInAt' => $this->lastSignInAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
