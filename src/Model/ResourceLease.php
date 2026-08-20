<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class ResourceLease implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id the lease is attached to.
     * @param PluginId::* $pluginId
     * @param string $resourceName Resource display name (denormalized at lease time, so it survives deletion).
     * @param string $expiresAt The lease deadline.
     * @param bool $autoDelete Whether the resource is deleted at expiry. Auto-delete is announced twice before it fires and deferred while an org change freeze is in effect.
     * @param string|null $note Why/who-for; shown on the expiry radar.
     * @param 'active'|'deleted'|'failed'|'canceled' $status Lease lifecycle: `active` (counting down), `deleted` (auto-delete completed), `failed` (auto-delete was retried and given up on — see `lastError`), or `canceled` (called off; the resource stays).
     * @param string|null $firstWarningAt When the first auto-delete announcement went out; null until sent.
     * @param string|null $finalWarningAt When the final auto-delete announcement went out; null until sent.
     * @param string|null $lastError Last auto-delete failure or freeze-deferral detail; never silent.
     * @param string|null $completedAt When the lease reached a terminal status.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceName,
        public readonly string $accountName,
        public readonly string $expiresAt,
        public readonly bool $autoDelete,
        public readonly ?string $note,
        public readonly string $status,
        public readonly ?string $firstWarningAt,
        public readonly ?string $finalWarningAt,
        public readonly int $deleteAttempts,
        public readonly ?string $lastError,
        public readonly ?string $completedAt,
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
            accountName: Coerce::toString($data['accountName'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            autoDelete: Coerce::toBool($data['autoDelete'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            firstWarningAt: Coerce::toStringOrNull($data['firstWarningAt'] ?? null),
            finalWarningAt: Coerce::toStringOrNull($data['finalWarningAt'] ?? null),
            deleteAttempts: Coerce::toInt($data['deleteAttempts'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
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
            'accountName' => $this->accountName,
            'expiresAt' => $this->expiresAt,
            'autoDelete' => $this->autoDelete,
            'note' => $this->note,
            'status' => $this->status,
            'firstWarningAt' => $this->firstWarningAt,
            'finalWarningAt' => $this->finalWarningAt,
            'deleteAttempts' => $this->deleteAttempts,
            'lastError' => $this->lastError,
            'completedAt' => $this->completedAt,
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
