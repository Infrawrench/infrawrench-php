<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

/**
 * Who owns this resource, or null when nobody has claimed it. Present only when the owner can be
 * named: a resource carrying a purpose but no owner reads as null, because the question this
 * answers is who to tell.
 *
 * The API may send `null` in place of this object.
 */
final class ResourceOwnerAnnotation implements \JsonSerializable
{
    /**
     * @param string|null $userId Set when a routable org member owns it.
     * @param string $displayName The member's name, or the free-text owner.
     * @param bool $isLabel True when the owner is free text — nothing can be routed to it.
     */
    public function __construct(
        public readonly ?string $userId,
        public readonly string $displayName,
        public readonly bool $isLabel,
        public readonly ?string $ticketUrl,
        public readonly ?string $purpose,
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
            userId: Coerce::toStringOrNull($data['userId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            isLabel: Coerce::toBool($data['isLabel'] ?? null),
            ticketUrl: Coerce::toStringOrNull($data['ticketUrl'] ?? null),
            purpose: Coerce::toStringOrNull($data['purpose'] ?? null),
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
            'userId' => $this->userId,
            'displayName' => $this->displayName,
            'isLabel' => $this->isLabel,
            'ticketUrl' => $this->ticketUrl,
            'purpose' => $this->purpose,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
