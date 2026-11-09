<?php

/*
 * infrawrench/sdk v1.101.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.101.0).
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

final class ChatMessage implements \JsonSerializable
{
    /**
     * @param 'user'|'assistant' $role
     * @param list<array{type: 'text', text: string, signature?: string, provider?: 'anthropic'|'gemini'}|array{type: 'thinking', thinking: string, signature: string, provider?: 'anthropic'|'gemini'}|array{type: 'tool_use', id: string, name: string, input: array<string, mixed>, signature?: string, provider?: 'anthropic'|'gemini'}|array{type: 'tool_result', tool_use_id: string, content: string|list<array<string, mixed>>, is_error?: bool}> $content
     * @param string|null $stopReason The model's stop reason (`end_turn`, `tool_use`, `max_tokens`, ...); null on user messages.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $conversationId,
        public readonly string $role,
        public readonly array $content,
        public readonly int $inputTokens,
        public readonly int $outputTokens,
        public readonly int $cacheReadTokens,
        public readonly int $cacheWriteTokens,
        public readonly ?string $stopReason,
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
            conversationId: Coerce::toString($data['conversationId'] ?? null),
            role: Coerce::toString($data['role'] ?? null),
            content: Coerce::toList($data['content'] ?? null),
            inputTokens: Coerce::toInt($data['inputTokens'] ?? null),
            outputTokens: Coerce::toInt($data['outputTokens'] ?? null),
            cacheReadTokens: Coerce::toInt($data['cacheReadTokens'] ?? null),
            cacheWriteTokens: Coerce::toInt($data['cacheWriteTokens'] ?? null),
            stopReason: Coerce::toStringOrNull($data['stopReason'] ?? null),
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
            'conversationId' => $this->conversationId,
            'role' => $this->role,
            'content' => $this->content,
            'inputTokens' => $this->inputTokens,
            'outputTokens' => $this->outputTokens,
            'cacheReadTokens' => $this->cacheReadTokens,
            'cacheWriteTokens' => $this->cacheWriteTokens,
            'stopReason' => $this->stopReason,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
