<?php

/*
 * infrawrench/sdk v1.97.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.97.0).
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

final class AgentT3PolicyApplyRequest implements \JsonSerializable
{
    /**
     * @param bool $restart Restart T3 Code so the policy applies now (interrupts running agent turns), or leave it for the next restart.
     * @param string|null $sessionId One server; omitted, every T3 Code server in the organization.
     */
    public function __construct(
        public readonly bool $restart,
        public readonly ?string $sessionId = null,
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
            restart: Coerce::toBool($data['restart'] ?? null),
            sessionId: Coerce::toStringOrNull($data['sessionId'] ?? null),
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
            'restart' => $this->restart,
        ];
        if ($this->sessionId !== null) {
            $payload['sessionId'] = $this->sessionId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
