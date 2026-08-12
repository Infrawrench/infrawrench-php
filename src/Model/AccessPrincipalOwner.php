<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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
 * Who owns the resource, from the resource-ownership record. Null when nobody is named.
 *
 * The API may send `null` in place of this object.
 */
final class AccessPrincipalOwner implements \JsonSerializable
{
    /**
     * @param string|null $userId Infrawrench user id when the owner is a member.
     * @param string $displayName Member name, or the free-text owner label.
     * @param bool $isLabel True when the owner is a label rather than a routable member.
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
