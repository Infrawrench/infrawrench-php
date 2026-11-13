<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class ChatPendingSecretRequest implements \JsonSerializable
{
    /** @param 'pending'|'submitting'|'stored' $status */
    public function __construct(
        public readonly string $id,
        public readonly string $conversationId,
        public readonly string $messageId,
        public readonly string $toolUseId,
        public readonly ?string $secretId,
        public readonly string $name,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly string $status,
        public readonly ?string $resolvedAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            conversationId: Coerce::toString($data['conversationId'] ?? null),
            messageId: Coerce::toString($data['messageId'] ?? null),
            toolUseId: Coerce::toString($data['toolUseId'] ?? null),
            secretId: Coerce::toStringOrNull($data['secretId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            title: Coerce::toStringOrNull($data['title'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'conversationId' => $this->conversationId,
            'messageId' => $this->messageId,
            'toolUseId' => $this->toolUseId,
            'secretId' => $this->secretId,
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'resolvedAt' => $this->resolvedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
