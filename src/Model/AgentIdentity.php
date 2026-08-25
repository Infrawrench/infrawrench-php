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

final class AgentIdentity implements \JsonSerializable
{
    /**
     * @param bool $claimPending A `user_code` is currently outstanding.
     * @param int|null $trialExpiresInMs Milliseconds until deletion. Null once the workspace is claimed.
     */
    public function __construct(
        public readonly string $registrationId,
        public readonly string $organizationId,
        public readonly bool $claimed,
        public readonly bool $claimPending,
        public readonly ?int $trialExpiresInMs,
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
            registrationId: Coerce::toString($data['registration_id'] ?? null),
            organizationId: Coerce::toString($data['organization_id'] ?? null),
            claimed: Coerce::toBool($data['claimed'] ?? null),
            claimPending: Coerce::toBool($data['claim_pending'] ?? null),
            trialExpiresInMs: Coerce::toIntOrNull($data['trial_expires_in_ms'] ?? null),
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
            'registration_id' => $this->registrationId,
            'organization_id' => $this->organizationId,
            'claimed' => $this->claimed,
            'claim_pending' => $this->claimPending,
            'trial_expires_in_ms' => $this->trialExpiresInMs,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
