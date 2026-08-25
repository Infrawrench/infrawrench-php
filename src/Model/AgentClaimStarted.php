<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class AgentClaimStarted implements \JsonSerializable
{
    /**
     * @param string $userCode Formatted as `XXXX-XXXX`. Show it to the user alongside `verification_uri`.
     * @param string $verificationUriComplete The verification page with the code pre-filled. Convenient, but it puts a live bearer secret in a URL — prefer `verification_uri` plus the code shown separately.
     * @param int $interval Minimum seconds between status polls.
     */
    public function __construct(
        public readonly string $userCode,
        public readonly string $verificationUri,
        public readonly string $verificationUriComplete,
        public readonly string $expiresAt,
        public readonly int $interval,
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
            userCode: Coerce::toString($data['user_code'] ?? null),
            verificationUri: Coerce::toString($data['verification_uri'] ?? null),
            verificationUriComplete: Coerce::toString($data['verification_uri_complete'] ?? null),
            expiresAt: Coerce::toString($data['expires_at'] ?? null),
            interval: Coerce::toInt($data['interval'] ?? null),
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
            'user_code' => $this->userCode,
            'verification_uri' => $this->verificationUri,
            'verification_uri_complete' => $this->verificationUriComplete,
            'expires_at' => $this->expiresAt,
            'interval' => $this->interval,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
