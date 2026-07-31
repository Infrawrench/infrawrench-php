<?php

/*
 * infrawrench/sdk v0.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.23.0).
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

final class AuditEntry implements \JsonSerializable
{
    /** @param array<string, mixed>|null $metadata */
    public function __construct(
        public readonly string $id,
        public readonly ?string $userId,
        public readonly ?string $apiKeyId,
        public readonly string $action,
        public readonly string $entityType,
        public readonly string $entityId,
        public readonly ?array $metadata,
        public readonly ?string $ipAddress,
        public readonly string $createdAt,
        public readonly ?string $userName,
        public readonly ?string $userEmail,
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
            userId: Coerce::toStringOrNull($data['userId'] ?? null),
            apiKeyId: Coerce::toStringOrNull($data['apiKeyId'] ?? null),
            action: Coerce::toString($data['action'] ?? null),
            entityType: Coerce::toString($data['entityType'] ?? null),
            entityId: Coerce::toString($data['entityId'] ?? null),
            metadata: Coerce::toArrayOrNull($data['metadata'] ?? null),
            ipAddress: Coerce::toStringOrNull($data['ipAddress'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            userEmail: Coerce::toStringOrNull($data['userEmail'] ?? null),
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
            'userId' => $this->userId,
            'apiKeyId' => $this->apiKeyId,
            'action' => $this->action,
            'entityType' => $this->entityType,
            'entityId' => $this->entityId,
            'metadata' => $this->metadata,
            'ipAddress' => $this->ipAddress,
            'createdAt' => $this->createdAt,
            'userName' => $this->userName,
            'userEmail' => $this->userEmail,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
