<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class TunnelSshAttachRequest implements \JsonSerializable
{
    /**
     * @param array{accountId: string, pluginId: string, resourceId: string} $tunnel
     * @param array{accountId: string, pluginId: string, resourceTypeId: string, resourceId: string} $host
     * @param 'http'|'https'|'ssh'|'tcp'|null $serviceType
     */
    public function __construct(
        public readonly array $tunnel,
        public readonly array $host,
        public readonly string $hostname,
        public readonly string $zoneId,
        public readonly string $sshUsername,
        public readonly ?string $serviceType = null,
        public readonly ?string $port = null,
        public readonly ?string $sshKeyId = null,
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
            tunnel: Coerce::toArray($data['tunnel'] ?? null),
            host: Coerce::toArray($data['host'] ?? null),
            hostname: Coerce::toString($data['hostname'] ?? null),
            zoneId: Coerce::toString($data['zoneId'] ?? null),
            sshUsername: Coerce::toString($data['sshUsername'] ?? null),
            serviceType: Coerce::toStringOrNull($data['serviceType'] ?? null),
            port: Coerce::toStringOrNull($data['port'] ?? null),
            sshKeyId: Coerce::toStringOrNull($data['sshKeyId'] ?? null),
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
            'tunnel' => $this->tunnel,
            'host' => $this->host,
            'hostname' => $this->hostname,
            'zoneId' => $this->zoneId,
            'sshUsername' => $this->sshUsername,
        ];
        if ($this->serviceType !== null) {
            $payload['serviceType'] = $this->serviceType;
        }
        if ($this->port !== null) {
            $payload['port'] = $this->port;
        }
        if ($this->sshKeyId !== null) {
            $payload['sshKeyId'] = $this->sshKeyId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
