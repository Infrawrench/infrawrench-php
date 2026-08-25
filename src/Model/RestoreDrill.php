<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class RestoreDrill implements \JsonSerializable
{
    /**
     * @param string $performedAt When the drill was performed, which is **not** when it was recorded — people write these up on Monday for a drill they ran on Saturday, and every staleness computation uses this.
     * @param 'verified'|'restored-unverified'|'failed'|'blocked' $outcome How the drill ended. Only `verified` counts as evidence the backup works: a restore that produced a running system nobody looked inside is exactly how a team discovers, mid-incident, that the dump had been empty for months. `restored-unverified` is recorded because doing the restore is worth recording, but it does not reset the clock.
     * @param int|null $rtoMinutes Measured wall-clock minutes. Null when the drill never got that far; a blocked drill has no RTO, and an invented one would be the most dangerous number on the page.
     * @param string|null $restoredFrom Snapshot id, S3 key, a date — free text.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $resourceId,
        public readonly ?string $resourceName,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly string $performedAt,
        public readonly string $outcome,
        public readonly ?int $rtoMinutes,
        public readonly ?string $restoredFrom,
        public readonly ?string $notes,
        public readonly ?string $performedByUserId,
        public readonly ?string $performedByName,
        public readonly string $createdAt,
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
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            performedAt: Coerce::toString($data['performedAt'] ?? null),
            outcome: Coerce::toString($data['outcome'] ?? null),
            rtoMinutes: Coerce::toIntOrNull($data['rtoMinutes'] ?? null),
            restoredFrom: Coerce::toStringOrNull($data['restoredFrom'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            performedByUserId: Coerce::toStringOrNull($data['performedByUserId'] ?? null),
            performedByName: Coerce::toStringOrNull($data['performedByName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'resourceName' => $this->resourceName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'performedAt' => $this->performedAt,
            'outcome' => $this->outcome,
            'rtoMinutes' => $this->rtoMinutes,
            'restoredFrom' => $this->restoredFrom,
            'notes' => $this->notes,
            'performedByUserId' => $this->performedByUserId,
            'performedByName' => $this->performedByName,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
