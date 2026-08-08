<?php

/*
 * infrawrench/sdk v1.1.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.1.0).
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

final class ResourceOwnership implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string $resourceName Resource display name, denormalized so a report can name a deleted resource.
     * @param string|null $ownerUserId The routable owner — an org member. Alerts about this resource reach them.
     * @param string|null $ownerName Resolved server-side; null when unset or removed.
     * @param string|null $ownerLabel Free-text owner (a team, a rota, a contractor). Display-only, never routed.
     * @param string|null $purpose What this resource is for.
     * @param string|null $ticketUrl Link to the ticket that authorized it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceName,
        public readonly ?string $ownerUserId,
        public readonly ?string $ownerName,
        public readonly ?string $ownerEmail,
        public readonly ?string $ownerLabel,
        public readonly ?string $purpose,
        public readonly ?string $ticketUrl,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            ownerUserId: Coerce::toStringOrNull($data['ownerUserId'] ?? null),
            ownerName: Coerce::toStringOrNull($data['ownerName'] ?? null),
            ownerEmail: Coerce::toStringOrNull($data['ownerEmail'] ?? null),
            ownerLabel: Coerce::toStringOrNull($data['ownerLabel'] ?? null),
            purpose: Coerce::toStringOrNull($data['purpose'] ?? null),
            ticketUrl: Coerce::toStringOrNull($data['ticketUrl'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceName' => $this->resourceName,
            'ownerUserId' => $this->ownerUserId,
            'ownerName' => $this->ownerName,
            'ownerEmail' => $this->ownerEmail,
            'ownerLabel' => $this->ownerLabel,
            'purpose' => $this->purpose,
            'ticketUrl' => $this->ticketUrl,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
