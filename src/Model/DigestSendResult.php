<?php

/*
 * infrawrench/sdk v1.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.2.0).
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

final class DigestSendResult implements \JsonSerializable
{
    /**
     * @param int $attempted Deliveries attempted across Slack channels, Teams webhooks and email recipients.
     */
    public function __construct(
        public readonly bool $ok,
        public readonly int $attempted,
        public readonly int $succeeded,
        public readonly DigestTransportResult $slack,
        public readonly DigestTransportResult $teams,
        public readonly DigestTransportResult $email,
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
            ok: Coerce::toBool($data['ok'] ?? null),
            attempted: Coerce::toInt($data['attempted'] ?? null),
            succeeded: Coerce::toInt($data['succeeded'] ?? null),
            slack: DigestTransportResult::fromArray(Coerce::toArray($data['slack'] ?? null)),
            teams: DigestTransportResult::fromArray(Coerce::toArray($data['teams'] ?? null)),
            email: DigestTransportResult::fromArray(Coerce::toArray($data['email'] ?? null)),
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
            'ok' => $this->ok,
            'attempted' => $this->attempted,
            'succeeded' => $this->succeeded,
            'slack' => $this->slack->toArray(),
            'teams' => $this->teams->toArray(),
            'email' => $this->email->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
