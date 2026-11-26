<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class GitForgeUsage implements \JsonSerializable
{
    /**
     * @param float $storageBytes Bytes of every repository's packs.
     * @param float $privateStorageBytes The part private repositories hold: what the limits count.
     */
    public function __construct(
        public readonly int $repositories,
        public readonly int $publicRepositories,
        public readonly int $privateRepositories,
        public readonly float $storageBytes,
        public readonly float $privateStorageBytes,
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
            repositories: Coerce::toInt($data['repositories'] ?? null),
            publicRepositories: Coerce::toInt($data['publicRepositories'] ?? null),
            privateRepositories: Coerce::toInt($data['privateRepositories'] ?? null),
            storageBytes: Coerce::toFloat($data['storageBytes'] ?? null),
            privateStorageBytes: Coerce::toFloat($data['privateStorageBytes'] ?? null),
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
            'repositories' => $this->repositories,
            'publicRepositories' => $this->publicRepositories,
            'privateRepositories' => $this->privateRepositories,
            'storageBytes' => $this->storageBytes,
            'privateStorageBytes' => $this->privateStorageBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
