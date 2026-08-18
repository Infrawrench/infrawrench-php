<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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
 * Org-wide notification tuning. Cooldown claims (`lastNotifiedAt`, `lastSentWeekStart`) are
 * deliberately absent: they are poller state, and resetting one from an apply would re-open a
 * quiet period and page people twice.
 */
final class OrgConfigAlertSettings implements \JsonSerializable
{
    /**
     * @param array{sigmas: float, minDeltaCents: int, newSourceMinCents: int, smsAlerts: 'off'|'new_source'|'all'}|null $costAnomaly
     * @param array{notifyCreated: bool, notifyUpdated: bool, notifyDeleted: bool, cooldownMinutes: int, minChanges: int, accounts: list<string>}|null $drift
     * @param array{enabled: bool, leadDays: int}|null $expiry
     * @param array{enabled: bool}|null $posture
     * @param array{enabled: bool, timezone: string, sendDay: int, sendHour: int, narrativeEnabled: bool, recipients: list<string>}|null $digest
     */
    public function __construct(
        public readonly ?array $costAnomaly = null,
        public readonly ?array $drift = null,
        public readonly ?array $expiry = null,
        public readonly ?array $posture = null,
        public readonly ?array $digest = null,
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
            costAnomaly: Coerce::toArrayOrNull($data['costAnomaly'] ?? null),
            drift: Coerce::toArrayOrNull($data['drift'] ?? null),
            expiry: Coerce::toArrayOrNull($data['expiry'] ?? null),
            posture: Coerce::toArrayOrNull($data['posture'] ?? null),
            digest: Coerce::toArrayOrNull($data['digest'] ?? null),
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
        ];
        if ($this->costAnomaly !== null) {
            $payload['costAnomaly'] = $this->costAnomaly;
        }
        if ($this->drift !== null) {
            $payload['drift'] = $this->drift;
        }
        if ($this->expiry !== null) {
            $payload['expiry'] = $this->expiry;
        }
        if ($this->posture !== null) {
            $payload['posture'] = $this->posture;
        }
        if ($this->digest !== null) {
            $payload['digest'] = $this->digest;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
