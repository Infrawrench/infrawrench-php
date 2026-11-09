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

final class ChatConversationCreateInput implements \JsonSerializable
{
    /**
     * @param 'gemini-3.7-flash'|'claude-sonnet-5'|'claude-opus-5'|'claude-haiku-4-5'|null $model The model the conversation runs on. Omitted: the cheapest model.
     * @param string|null $title Initial title, cut to 200 characters. Omitted: `New chat`, renamed after the first message.
     * @param string|null $systemPrompt Replaces the agent's default system prompt.
     */
    public function __construct(
        public readonly ?string $model = null,
        public readonly ?string $title = null,
        public readonly ?string $systemPrompt = null,
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
            model: Coerce::toStringOrNull($data['model'] ?? null),
            title: Coerce::toStringOrNull($data['title'] ?? null),
            systemPrompt: Coerce::toStringOrNull($data['systemPrompt'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
        ];
        if ($this->model !== null) {
            $payload['model'] = $this->model;
        }
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }
        if ($this->systemPrompt !== null) {
            $payload['systemPrompt'] = $this->systemPrompt;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
