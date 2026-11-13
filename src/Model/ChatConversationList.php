<?php

/*
 * infrawrench/sdk v1.106.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.106.0).
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

final class ChatConversationList implements \JsonSerializable
{
    /**
     * @param list<ChatConversationSummary> $conversations The caller's conversations in this organization, most recently active first; at most 200, archived ones left out.
     */
    public function __construct(
        public readonly array $conversations,
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
            conversations: Coerce::mapList($data['conversations'] ?? null, static fn (mixed $item): ChatConversationSummary => ChatConversationSummary::fromArray(Coerce::toArray($item))),
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
            'conversations' => array_map(static fn (ChatConversationSummary $item): array => $item->toArray(), $this->conversations),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
