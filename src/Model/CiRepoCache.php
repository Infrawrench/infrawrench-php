<?php

/*
 * infrawrench/sdk v1.105.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.105.0).
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

final class CiRepoCache implements \JsonSerializable
{
    /**
     * @param string $repo The repository's name, lowercased.
     * @param float|'Infinity'|'-Infinity'|'NaN' $bytes
     */
    public function __construct(
        public readonly string $repo,
        public readonly float|string $bytes,
        public readonly int $entries,
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
            repo: Coerce::toString($data['repo'] ?? null),
            bytes: $data['bytes'] ?? null,
            entries: Coerce::toInt($data['entries'] ?? null),
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
            'repo' => $this->repo,
            'bytes' => $this->bytes,
            'entries' => $this->entries,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
