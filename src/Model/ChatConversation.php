<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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

final class ChatConversation implements \JsonSerializable
{
    /**
     * @param string $organizationId Organization id
     * @param string|null $userId The owner: always the caller, since a conversation is only readable by its owner.
     * @param string|null $costCanvasId The cost canvas this conversation builds and edits, when it was started from one.
     * @param string|null $systemPrompt The system prompt override; null runs the agent's default.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly ?string $userId,
        public readonly ?string $costCanvasId,
        public readonly string $title,
        public readonly string $model,
        public readonly ?string $systemPrompt,
        public readonly ?string $archivedAt,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            userId: Coerce::toStringOrNull($data['userId'] ?? null),
            costCanvasId: Coerce::toStringOrNull($data['costCanvasId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            model: Coerce::toString($data['model'] ?? null),
            systemPrompt: Coerce::toStringOrNull($data['systemPrompt'] ?? null),
            archivedAt: Coerce::toStringOrNull($data['archivedAt'] ?? null),
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
            'organizationId' => $this->organizationId,
            'userId' => $this->userId,
            'costCanvasId' => $this->costCanvasId,
            'title' => $this->title,
            'model' => $this->model,
            'systemPrompt' => $this->systemPrompt,
            'archivedAt' => $this->archivedAt,
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
