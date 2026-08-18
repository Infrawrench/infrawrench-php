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

final class RegisteredAgent implements \JsonSerializable
{
    /**
     * @param string $credential Bearer credential for this registration. Format `iwa_<base64url>`. Returned once and never recoverable — there is no route that can show it again.
     * @param string $trialExpiresAt When the trial workspace is deleted unless a person claims it.
     * @param string $notice Human-readable summary of the trial terms, meant to be relayed to the user.
     */
    public function __construct(
        public readonly string $registrationId,
        public readonly string $credential,
        public readonly string $organizationId,
        public readonly string $trialExpiresAt,
        public readonly string $claimUrl,
        public readonly string $notice,
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
            credential: Coerce::toString($data['credential'] ?? null),
            organizationId: Coerce::toString($data['organization_id'] ?? null),
            trialExpiresAt: Coerce::toString($data['trial_expires_at'] ?? null),
            claimUrl: Coerce::toString($data['claim_url'] ?? null),
            notice: Coerce::toString($data['notice'] ?? null),
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
            'credential' => $this->credential,
            'organization_id' => $this->organizationId,
            'trial_expires_at' => $this->trialExpiresAt,
            'claim_url' => $this->claimUrl,
            'notice' => $this->notice,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
