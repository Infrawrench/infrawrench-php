<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class SshExecRequest implements \JsonSerializable
{
    public function __construct(
        public readonly string $sshHost,
        public readonly int $sshPort,
        public readonly string $sshUser,
        public readonly string $sshKeyId,
        public readonly string $command,
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
            sshHost: Coerce::toString($data['sshHost'] ?? null),
            sshPort: Coerce::toInt($data['sshPort'] ?? null),
            sshUser: Coerce::toString($data['sshUser'] ?? null),
            sshKeyId: Coerce::toString($data['sshKeyId'] ?? null),
            command: Coerce::toString($data['command'] ?? null),
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
            'sshHost' => $this->sshHost,
            'sshPort' => $this->sshPort,
            'sshUser' => $this->sshUser,
            'sshKeyId' => $this->sshKeyId,
            'command' => $this->command,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
