<?php

/*
 * infrawrench/sdk v0.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.37.0).
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

final class SshTunnelCreateAccountRequest implements \JsonSerializable
{
    /** @param array<string, string> $credentials */
    public function __construct(
        public readonly string $sshHost,
        public readonly int $sshPort,
        public readonly string $sshUser,
        public readonly string $sshKeyId,
        public readonly string $remoteHost,
        public readonly int $remotePort,
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly array $credentials,
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
            remoteHost: Coerce::toString($data['remoteHost'] ?? null),
            remotePort: Coerce::toInt($data['remotePort'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            credentials: Coerce::mapValues($data['credentials'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'remoteHost' => $this->remoteHost,
            'remotePort' => $this->remotePort,
            'pluginId' => $this->pluginId,
            'displayName' => $this->displayName,
            'credentials' => $this->credentials,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
