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

/** A cloud job's `cloud:` block and what ran it. */
final class CiJobCloud implements \JsonSerializable
{
    /** @param string|null $executor What ran it, e.g. `aws ec2 i-0abc (eu-west-1)`. */
    public function __construct(
        public readonly string $provider,
        public readonly string $kind,
        public readonly ?string $machine = null,
        public readonly ?string $region = null,
        public readonly ?string $executor = null,
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
            provider: Coerce::toString($data['provider'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            machine: Coerce::toStringOrNull($data['machine'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            executor: Coerce::toStringOrNull($data['executor'] ?? null),
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
            'provider' => $this->provider,
            'kind' => $this->kind,
        ];
        if ($this->machine !== null) {
            $payload['machine'] = $this->machine;
        }
        if ($this->region !== null) {
            $payload['region'] = $this->region;
        }
        if ($this->executor !== null) {
            $payload['executor'] = $this->executor;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
