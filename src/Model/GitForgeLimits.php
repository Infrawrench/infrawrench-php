<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class GitForgeLimits implements \JsonSerializable
{
    /**
     * @param int|null $privateRepositories How many private repositories the plan allows. Null is no limit.
     * @param float $privateStorageBytes Bytes of private repositories at which pushes to them are refused.
     * @param float $includedStorageBytes Bytes of private repositories that cost nothing. Storage between this and `privateStorageBytes` is metered; where the two are equal nothing is.
     */
    public function __construct(
        public readonly ?int $privateRepositories,
        public readonly float $privateStorageBytes,
        public readonly float $includedStorageBytes,
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
            privateRepositories: Coerce::toIntOrNull($data['privateRepositories'] ?? null),
            privateStorageBytes: Coerce::toFloat($data['privateStorageBytes'] ?? null),
            includedStorageBytes: Coerce::toFloat($data['includedStorageBytes'] ?? null),
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
            'privateRepositories' => $this->privateRepositories,
            'privateStorageBytes' => $this->privateStorageBytes,
            'includedStorageBytes' => $this->includedStorageBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
