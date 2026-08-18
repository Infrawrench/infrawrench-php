<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

final class IncidentNote implements \JsonSerializable
{
    /**
     * @param string $occurredAt When the note is *about*, which may precede when it was written — a note typed at 04:00 can be dated to 03:14 and lands there on the timeline.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $body,
        public readonly ?string $authorUserId,
        public readonly ?string $authorName,
        public readonly string $occurredAt,
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
            body: Coerce::toString($data['body'] ?? null),
            authorUserId: Coerce::toStringOrNull($data['authorUserId'] ?? null),
            authorName: Coerce::toStringOrNull($data['authorName'] ?? null),
            occurredAt: Coerce::toString($data['occurredAt'] ?? null),
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
            'body' => $this->body,
            'authorUserId' => $this->authorUserId,
            'authorName' => $this->authorName,
            'occurredAt' => $this->occurredAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
