<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class ResourceOwnershipPatch implements \JsonSerializable
{
    /**
     * @param string|null $ownerUserId Omit to keep, null to clear.
     * @param string|null $ownerLabel Omit to keep, null to clear.
     * @param string|null $purpose Omit to keep, null to clear.
     * @param string|null $ticketUrl Omit to keep, null to clear.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly ?string $ownerUserId = null,
        public readonly ?string $ownerLabel = null,
        public readonly ?string $purpose = null,
        public readonly ?string $ticketUrl = null,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            ownerUserId: Coerce::toStringOrNull($data['ownerUserId'] ?? null),
            ownerLabel: Coerce::toStringOrNull($data['ownerLabel'] ?? null),
            purpose: Coerce::toStringOrNull($data['purpose'] ?? null),
            ticketUrl: Coerce::toStringOrNull($data['ticketUrl'] ?? null),
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
            'resourceId' => $this->resourceId,
        ];
        if ($this->ownerUserId !== null) {
            $payload['ownerUserId'] = $this->ownerUserId;
        }
        if ($this->ownerLabel !== null) {
            $payload['ownerLabel'] = $this->ownerLabel;
        }
        if ($this->purpose !== null) {
            $payload['purpose'] = $this->purpose;
        }
        if ($this->ticketUrl !== null) {
            $payload['ticketUrl'] = $this->ticketUrl;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
