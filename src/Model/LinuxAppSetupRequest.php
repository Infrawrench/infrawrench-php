<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class LinuxAppSetupRequest implements \JsonSerializable
{
    /** @param list<LinuxAppRequirementId::*>|null $requirements */
    public function __construct(
        public readonly string $accountId,
        public readonly string $resourceId,
        public readonly string $sshKeyId,
        public readonly string $host,
        public readonly string $username,
        public readonly ?int $port = null,
        public readonly ?array $requirements = null,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            sshKeyId: Coerce::toString($data['sshKeyId'] ?? null),
            host: Coerce::toString($data['host'] ?? null),
            username: Coerce::toString($data['username'] ?? null),
            port: Coerce::toIntOrNull($data['port'] ?? null),
            requirements: Coerce::nullable($data['requirements'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'sshKeyId' => $this->sshKeyId,
            'host' => $this->host,
            'username' => $this->username,
        ];
        if ($this->port !== null) {
            $payload['port'] = $this->port;
        }
        if ($this->requirements !== null) {
            $payload['requirements'] = $this->requirements;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
