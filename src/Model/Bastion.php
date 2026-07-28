<?php

/*
 * infrawrench/sdk v0.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.9.0).
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

final class Bastion implements \JsonSerializable
{
    /** @param BastionStatus::* $status */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $tokenPrefix,
        public readonly ?string $agentVersion,
        public readonly ?string $lastSeenAt,
        public readonly string $status,
        public readonly ?string $revokedAt,
        public readonly string $createdAt,
        public readonly string $createdByUserId,
        public readonly bool $connected,
        public readonly int $accountCount,
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
            tokenPrefix: Coerce::toString($data['tokenPrefix'] ?? null),
            agentVersion: Coerce::toStringOrNull($data['agentVersion'] ?? null),
            lastSeenAt: Coerce::toStringOrNull($data['lastSeenAt'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            createdByUserId: Coerce::toString($data['createdByUserId'] ?? null),
            connected: Coerce::toBool($data['connected'] ?? null),
            accountCount: Coerce::toInt($data['accountCount'] ?? null),
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
            'tokenPrefix' => $this->tokenPrefix,
            'agentVersion' => $this->agentVersion,
            'lastSeenAt' => $this->lastSeenAt,
            'status' => $this->status,
            'revokedAt' => $this->revokedAt,
            'createdAt' => $this->createdAt,
            'createdByUserId' => $this->createdByUserId,
            'connected' => $this->connected,
            'accountCount' => $this->accountCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
