<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

/**
 * What the job was lent, by name only: connections, SSH keys, resources and `env-from:` grants.
 */
final class CiJobAccessNames implements \JsonSerializable
{
    /**
     * @param list<string>|null $connections
     * @param list<string>|null $sshKeys
     * @param list<string>|null $resources
     * @param list<string>|null $envFrom
     */
    public function __construct(
        public readonly ?array $connections = null,
        public readonly ?array $sshKeys = null,
        public readonly ?array $resources = null,
        public readonly ?array $envFrom = null,
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
            connections: Coerce::nullable($data['connections'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            sshKeys: Coerce::nullable($data['sshKeys'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            resources: Coerce::nullable($data['resources'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            envFrom: Coerce::nullable($data['envFrom'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        ];
        if ($this->connections !== null) {
            $payload['connections'] = $this->connections;
        }
        if ($this->sshKeys !== null) {
            $payload['sshKeys'] = $this->sshKeys;
        }
        if ($this->resources !== null) {
            $payload['resources'] = $this->resources;
        }
        if ($this->envFrom !== null) {
            $payload['envFrom'] = $this->envFrom;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
