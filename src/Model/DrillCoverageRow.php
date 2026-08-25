<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class DrillCoverageRow implements \JsonSerializable
{
    /**
     * @param 'verified'|'stale'|'failed'|'never' $standing `never` and `stale` are kept apart because they call for different conversations: one is 'nobody has ever tried', the other is 'it worked in March'.
     * @param 'verified'|'restored-unverified'|'failed'|'blocked'|null $lastOutcome How the drill ended. Only `verified` counts as evidence the backup works: a restore that produced a running system nobody looked inside is exactly how a team discovers, mid-incident, that the dump had been empty for months. `restored-unverified` is recorded because doing the restore is worth recording, but it does not reset the clock.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly ?string $resourceName,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $resourceTypeId,
        public readonly string $standing,
        public readonly ?string $lastDrillAt,
        public readonly ?string $lastOutcome,
        public readonly ?string $lastVerifiedAt,
        public readonly ?int $verifiedRtoMinutes,
        public readonly ?int $daysUntilStale,
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
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            standing: Coerce::toString($data['standing'] ?? null),
            lastDrillAt: Coerce::toStringOrNull($data['lastDrillAt'] ?? null),
            lastOutcome: Coerce::toStringOrNull($data['lastOutcome'] ?? null),
            lastVerifiedAt: Coerce::toStringOrNull($data['lastVerifiedAt'] ?? null),
            verifiedRtoMinutes: Coerce::toIntOrNull($data['verifiedRtoMinutes'] ?? null),
            daysUntilStale: Coerce::toIntOrNull($data['daysUntilStale'] ?? null),
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
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'resourceTypeId' => $this->resourceTypeId,
            'standing' => $this->standing,
            'lastDrillAt' => $this->lastDrillAt,
            'lastOutcome' => $this->lastOutcome,
            'lastVerifiedAt' => $this->lastVerifiedAt,
            'verifiedRtoMinutes' => $this->verifiedRtoMinutes,
            'daysUntilStale' => $this->daysUntilStale,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
