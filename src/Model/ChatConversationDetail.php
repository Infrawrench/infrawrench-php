<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class ChatConversationDetail implements \JsonSerializable
{
    /**
     * @param list<ChatMessage> $messages Oldest first.
     * @param list<ChatPendingAction> $pendingActions Every tool call that needed approval or an answer, oldest first, whatever its status.
     * @param list<ChatPendingSecretRequest> $pendingSecretRequests Every secret the agent asked a human to enter, oldest first. Values are never included.
     */
    public function __construct(
        public readonly ChatConversation $conversation,
        public readonly array $messages,
        public readonly array $pendingActions,
        public readonly array $pendingSecretRequests,
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
            conversation: ChatConversation::fromArray(Coerce::toArray($data['conversation'] ?? null)),
            messages: Coerce::mapList($data['messages'] ?? null, static fn (mixed $item): ChatMessage => ChatMessage::fromArray(Coerce::toArray($item))),
            pendingActions: Coerce::mapList($data['pendingActions'] ?? null, static fn (mixed $item): ChatPendingAction => ChatPendingAction::fromArray(Coerce::toArray($item))),
            pendingSecretRequests: Coerce::mapList($data['pendingSecretRequests'] ?? null, static fn (mixed $item): ChatPendingSecretRequest => ChatPendingSecretRequest::fromArray(Coerce::toArray($item))),
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
            'conversation' => $this->conversation->toArray(),
            'messages' => array_map(static fn (ChatMessage $item): array => $item->toArray(), $this->messages),
            'pendingActions' => array_map(static fn (ChatPendingAction $item): array => $item->toArray(), $this->pendingActions),
            'pendingSecretRequests' => array_map(static fn (ChatPendingSecretRequest $item): array => $item->toArray(), $this->pendingSecretRequests),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
