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

final class ChatPendingAction implements \JsonSerializable
{
    /**
     * @param array<string, mixed> $toolInput
     * @param 'pending'|'approved'|'rejected'|'executed'|'errored' $status
     * @param string|null $result The tool's result once executed, or the rejection reason.
     * @param string|null $summary What approving would change, in plain lines, when the tool can say so.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $conversationId,
        public readonly string $messageId,
        public readonly string $toolUseId,
        public readonly string $toolName,
        public readonly array $toolInput,
        public readonly string $status,
        public readonly ?string $result,
        public readonly bool $isError,
        public readonly ?string $summary,
        public readonly ?string $resolvedAt,
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
            messageId: Coerce::toString($data['messageId'] ?? null),
            toolUseId: Coerce::toString($data['toolUseId'] ?? null),
            toolName: Coerce::toString($data['toolName'] ?? null),
            toolInput: Coerce::toArray($data['toolInput'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            result: Coerce::toStringOrNull($data['result'] ?? null),
            isError: Coerce::toBool($data['isError'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
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
            'messageId' => $this->messageId,
            'toolUseId' => $this->toolUseId,
            'toolName' => $this->toolName,
            'toolInput' => $this->toolInput,
            'status' => $this->status,
            'result' => $this->result,
            'isError' => $this->isError,
            'summary' => $this->summary,
            'resolvedAt' => $this->resolvedAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
