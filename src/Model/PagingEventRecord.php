<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PagingEventRecord implements \JsonSerializable
{
    /**
     * @param 'triggered'|'acknowledged'|'resolved' $state
     * @param 'trigger'|'acknowledge'|'resolve'|null $pendingAction
     */
    public function __construct(
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $targetId,
        public readonly string $dedupKey,
        public readonly string $trigger,
        public readonly string $title,
        public readonly string $state,
        public readonly ?string $pendingAction,
        public readonly int $attempts,
        public readonly ?string $lastError,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $sentAt,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            targetId: Coerce::toString($data['targetId'] ?? null),
            dedupKey: Coerce::toString($data['dedupKey'] ?? null),
            trigger: Coerce::toString($data['trigger'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            pendingAction: Coerce::toStringOrNull($data['pendingAction'] ?? null),
            attempts: Coerce::toInt($data['attempts'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            sentAt: Coerce::toStringOrNull($data['sentAt'] ?? null),
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
            'accountId' => $this->accountId,
            'targetId' => $this->targetId,
            'dedupKey' => $this->dedupKey,
            'trigger' => $this->trigger,
            'title' => $this->title,
            'state' => $this->state,
            'pendingAction' => $this->pendingAction,
            'attempts' => $this->attempts,
            'lastError' => $this->lastError,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'sentAt' => $this->sentAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
