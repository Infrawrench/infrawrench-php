<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

final class UserSession implements \JsonSerializable
{
    /** @param bool $current True for the session making this request */
    public function __construct(
        public readonly string $id,
        public readonly ?string $ipAddress,
        public readonly ?string $userAgent,
        public readonly string $authMethod,
        public readonly string $status,
        public readonly string $expiresAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly bool $current,
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
            ipAddress: Coerce::toStringOrNull($data['ipAddress'] ?? null),
            userAgent: Coerce::toStringOrNull($data['userAgent'] ?? null),
            authMethod: Coerce::toString($data['authMethod'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            current: Coerce::toBool($data['current'] ?? null),
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
            'ipAddress' => $this->ipAddress,
            'userAgent' => $this->userAgent,
            'authMethod' => $this->authMethod,
            'status' => $this->status,
            'expiresAt' => $this->expiresAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'current' => $this->current,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
