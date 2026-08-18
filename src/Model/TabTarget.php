<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class TabTarget implements \JsonSerializable
{
    public function __construct(
        public readonly string $kind,
        public readonly ?string $dashboardId = null,
        public readonly ?string $accountId = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $conversationId = null,
        public readonly ?string $reportId = null,
        public readonly ?string $invoiceId = null,
        public readonly ?string $sessionId = null,
        public readonly ?int $windowId = null,
        public readonly ?string $appId = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            dashboardId: Coerce::toStringOrNull($data['dashboardId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            conversationId: Coerce::toStringOrNull($data['conversationId'] ?? null),
            reportId: Coerce::toStringOrNull($data['reportId'] ?? null),
            invoiceId: Coerce::toStringOrNull($data['invoiceId'] ?? null),
            sessionId: Coerce::toStringOrNull($data['sessionId'] ?? null),
            windowId: Coerce::toIntOrNull($data['windowId'] ?? null),
            appId: Coerce::toStringOrNull($data['appId'] ?? null),
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
            'kind' => $this->kind,
        ];
        if ($this->dashboardId !== null) {
            $payload['dashboardId'] = $this->dashboardId;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->conversationId !== null) {
            $payload['conversationId'] = $this->conversationId;
        }
        if ($this->reportId !== null) {
            $payload['reportId'] = $this->reportId;
        }
        if ($this->invoiceId !== null) {
            $payload['invoiceId'] = $this->invoiceId;
        }
        if ($this->sessionId !== null) {
            $payload['sessionId'] = $this->sessionId;
        }
        if ($this->windowId !== null) {
            $payload['windowId'] = $this->windowId;
        }
        if ($this->appId !== null) {
            $payload['appId'] = $this->appId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
