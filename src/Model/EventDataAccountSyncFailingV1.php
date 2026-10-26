<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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
 * `data` of a `account.sync.failing` event, version 1. An account's sync kept failing past the
 * org's paging threshold.
 *
 * Spec schema: `EventData_account_sync_failing_v1`.
 */
final class EventDataAccountSyncFailingV1 implements \JsonSerializable
{
    /**
     * @param string $accountId The account whose sync is failing.
     * @param string $accountName Account display name.
     * @param string $resourceTypeId The resource type the failing sync lists.
     * @param string $incidentId Sync incident id (shared by failing and recovered).
     * @param string $error The provider's last error.
     * @param int $failureCount Failures in the window.
     * @param int $windowMinutes The window the failures were counted in.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $resourceTypeId,
        public readonly string $incidentId,
        public readonly string $error,
        public readonly int $failureCount,
        public readonly int $windowMinutes,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            incidentId: Coerce::toString($data['incidentId'] ?? null),
            error: Coerce::toString($data['error'] ?? null),
            failureCount: Coerce::toInt($data['failureCount'] ?? null),
            windowMinutes: Coerce::toInt($data['windowMinutes'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'resourceTypeId' => $this->resourceTypeId,
            'incidentId' => $this->incidentId,
            'error' => $this->error,
            'failureCount' => $this->failureCount,
            'windowMinutes' => $this->windowMinutes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
