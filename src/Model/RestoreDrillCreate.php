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

final class RestoreDrillCreate implements \JsonSerializable
{
    /**
     * @param 'verified'|'restored-unverified'|'failed'|'blocked' $outcome How the drill ended. Only `verified` counts as evidence the backup works: a restore that produced a running system nobody looked inside is exactly how a team discovers, mid-incident, that the dump had been empty for months. `restored-unverified` is recorded because doing the restore is worth recording, but it does not reset the clock.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $performedAt,
        public readonly string $outcome,
        public readonly ?int $rtoMinutes = null,
        public readonly ?string $restoredFrom = null,
        public readonly ?string $notes = null,
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
            performedAt: Coerce::toString($data['performedAt'] ?? null),
            outcome: Coerce::toString($data['outcome'] ?? null),
            rtoMinutes: Coerce::toIntOrNull($data['rtoMinutes'] ?? null),
            restoredFrom: Coerce::toStringOrNull($data['restoredFrom'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
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
            'performedAt' => $this->performedAt,
            'outcome' => $this->outcome,
        ];
        if ($this->rtoMinutes !== null) {
            $payload['rtoMinutes'] = $this->rtoMinutes;
        }
        if ($this->restoredFrom !== null) {
            $payload['restoredFrom'] = $this->restoredFrom;
        }
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
