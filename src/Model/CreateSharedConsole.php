<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class CreateSharedConsole implements \JsonSerializable
{
    /**
     * @param string $liveConsoleId The pty to share, as the terminal's WebSocket reported it in its `ssh:connected` frame. Everything else about the session — host, account, recording — is read from the proxy's own registration rather than from this body.
     * @param bool|null $allowHandover Defaults to true.
     * @param int|null $inviteTtlMinutes Defaults to 15.
     */
    public function __construct(
        public readonly string $liveConsoleId,
        public readonly string $routingKey,
        public readonly ?bool $allowHandover = null,
        public readonly ?int $inviteTtlMinutes = null,
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
            liveConsoleId: Coerce::toString($data['liveConsoleId'] ?? null),
            routingKey: Coerce::toString($data['routingKey'] ?? null),
            allowHandover: Coerce::toBoolOrNull($data['allowHandover'] ?? null),
            inviteTtlMinutes: Coerce::toIntOrNull($data['inviteTtlMinutes'] ?? null),
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
            'liveConsoleId' => $this->liveConsoleId,
            'routingKey' => $this->routingKey,
        ];
        if ($this->allowHandover !== null) {
            $payload['allowHandover'] = $this->allowHandover;
        }
        if ($this->inviteTtlMinutes !== null) {
            $payload['inviteTtlMinutes'] = $this->inviteTtlMinutes;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
