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

final class EnvironmentInstanceMember implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'pending'|'created'|'failed'|'deleted' $status
     * @param string|null $leaseId The lease that auto-deletes this member at the TTL.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $memberKey,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly ?string $resourceId,
        public readonly ?string $externalId,
        public readonly string $displayName,
        public readonly string $status,
        public readonly ?string $error,
        public readonly ?string $leaseId,
        public readonly int $position,
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
            memberKey: Coerce::toString($data['memberKey'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            leaseId: Coerce::toStringOrNull($data['leaseId'] ?? null),
            position: Coerce::toInt($data['position'] ?? null),
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
            'memberKey' => $this->memberKey,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'externalId' => $this->externalId,
            'displayName' => $this->displayName,
            'status' => $this->status,
            'error' => $this->error,
            'leaseId' => $this->leaseId,
            'position' => $this->position,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
