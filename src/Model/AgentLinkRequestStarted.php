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

final class AgentLinkRequestStarted implements \JsonSerializable
{
    /**
     * @param string $deviceCode Secret to the platform; poll with it.
     * @param string $userCode `XXXX-XXXX`, shown to the person.
     * @param int $expiresIn Seconds.
     * @param int $interval Minimum seconds between polls.
     */
    public function __construct(
        public readonly string $deviceCode,
        public readonly string $userCode,
        public readonly string $verificationUrl,
        public readonly string $verificationUrlComplete,
        public readonly int $expiresIn,
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
            deviceCode: Coerce::toString($data['deviceCode'] ?? null),
            userCode: Coerce::toString($data['userCode'] ?? null),
            verificationUrl: Coerce::toString($data['verificationUrl'] ?? null),
            verificationUrlComplete: Coerce::toString($data['verificationUrlComplete'] ?? null),
            expiresIn: Coerce::toInt($data['expiresIn'] ?? null),
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
            'deviceCode' => $this->deviceCode,
            'userCode' => $this->userCode,
            'verificationUrl' => $this->verificationUrl,
            'verificationUrlComplete' => $this->verificationUrlComplete,
            'expiresIn' => $this->expiresIn,
            'interval' => $this->interval,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
