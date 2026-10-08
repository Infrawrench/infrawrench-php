<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class PagingProviderSettings implements \JsonSerializable
{
    /**
     * @param bool $inboundEnabled Mirror this account's incidents into Infrawrench.
     * @param bool $webhookConfigured A webhook (subscribed by Infrawrench, or a pasted signing secret) is in place.
     * @param string|null $webhookUrl The URL a manually configured webhook must point at. Null until inbound is enabled, or when the deployment has no public URL.
     */
    public function __construct(
        public readonly bool $inboundEnabled,
        public readonly bool $webhookConfigured,
        public readonly ?string $webhookUrl,
        public readonly ?string $lastSyncedAt,
        public readonly ?string $lastSyncError,
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
            inboundEnabled: Coerce::toBool($data['inboundEnabled'] ?? null),
            webhookConfigured: Coerce::toBool($data['webhookConfigured'] ?? null),
            webhookUrl: Coerce::toStringOrNull($data['webhookUrl'] ?? null),
            lastSyncedAt: Coerce::toStringOrNull($data['lastSyncedAt'] ?? null),
            lastSyncError: Coerce::toStringOrNull($data['lastSyncError'] ?? null),
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
            'inboundEnabled' => $this->inboundEnabled,
            'webhookConfigured' => $this->webhookConfigured,
            'webhookUrl' => $this->webhookUrl,
            'lastSyncedAt' => $this->lastSyncedAt,
            'lastSyncError' => $this->lastSyncError,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
