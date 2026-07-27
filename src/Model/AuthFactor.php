<?php

/*
 * infrawrench/sdk v0.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.6.0).
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

final class AuthFactor implements \JsonSerializable
{
    /** @param 'totp'|'sms'|'generic_otp' $type */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $totpIssuer,
        public readonly ?string $totpUser,
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
            type: Coerce::toString($data['type'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            totpIssuer: Coerce::toStringOrNull($data['totpIssuer'] ?? null),
            totpUser: Coerce::toStringOrNull($data['totpUser'] ?? null),
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
            'type' => $this->type,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'totpIssuer' => $this->totpIssuer,
            'totpUser' => $this->totpUser,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
