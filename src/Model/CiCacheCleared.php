<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class CiCacheCleared implements \JsonSerializable
{
    /** @param float|'Infinity'|'-Infinity'|'NaN' $deletedBytes */
    public function __construct(
        public readonly int $installationId,
        public readonly string $repo,
        public readonly int $deletedEntries,
        public readonly float|string $deletedBytes,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            deletedEntries: Coerce::toInt($data['deletedEntries'] ?? null),
            deletedBytes: $data['deletedBytes'] ?? null,
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
            'installationId' => $this->installationId,
            'repo' => $this->repo,
            'deletedEntries' => $this->deletedEntries,
            'deletedBytes' => $this->deletedBytes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
