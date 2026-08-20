<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class SshFanoutRunRequest implements \JsonSerializable
{
    /** @param list<array{kind: 'account'|'resource', id: string}> $targets */
    public function __construct(
        public readonly string $command,
        public readonly array $targets,
        public readonly ?string $sshKeyId = null,
        public readonly ?string $username = null,
        public readonly ?int $concurrency = null,
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
            command: Coerce::toString($data['command'] ?? null),
            targets: Coerce::mapList($data['targets'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            sshKeyId: Coerce::toStringOrNull($data['sshKeyId'] ?? null),
            username: Coerce::toStringOrNull($data['username'] ?? null),
            concurrency: Coerce::toIntOrNull($data['concurrency'] ?? null),
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
            'command' => $this->command,
            'targets' => $this->targets,
        ];
        if ($this->sshKeyId !== null) {
            $payload['sshKeyId'] = $this->sshKeyId;
        }
        if ($this->username !== null) {
            $payload['username'] = $this->username;
        }
        if ($this->concurrency !== null) {
            $payload['concurrency'] = $this->concurrency;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
