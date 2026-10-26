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
 * `data` of a `account.sync.recovered` event, version 1. A failing account sync succeeded again.
 *
 * Spec schema: `EventData_account_sync_recovered_v1`.
 */
final class EventDataAccountSyncRecoveredV1 implements \JsonSerializable
{
    /**
     * @param string $accountId The account whose sync is failing.
     * @param string $accountName Account display name.
     * @param string $resourceTypeId The resource type the failing sync lists.
     * @param string $incidentId Sync incident id (shared by failing and recovered).
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $resourceTypeId,
        public readonly string $incidentId,
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
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
