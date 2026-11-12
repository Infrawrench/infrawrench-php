<?php

/*
 * infrawrench/sdk v1.104.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.104.0).
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

final class CiDownload implements \JsonSerializable
{
    /**
     * @param string $path Where the job left it: relative to the clone when it is under it, else absolute.
     * @param float|'Infinity'|'-Infinity'|'NaN' $size
     * @param string $sha256 Of the stored bytes; for a text file, after masking.
     * @param string $expiresAt When it stops being served and is deleted.
     * @param bool $masked A text file, with the run's secrets masked. `false` for a binary file, which is stored as the job left it.
     */
    public function __construct(
        public readonly string $path,
        public readonly float|string $size,
        public readonly string $sha256,
        public readonly string $contentType,
        public readonly string $expiresAt,
        public readonly bool $masked,
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
            path: Coerce::toString($data['path'] ?? null),
            size: $data['size'] ?? null,
            sha256: Coerce::toString($data['sha256'] ?? null),
            contentType: Coerce::toString($data['contentType'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            masked: Coerce::toBool($data['masked'] ?? null),
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
            'path' => $this->path,
            'size' => $this->size,
            'sha256' => $this->sha256,
            'contentType' => $this->contentType,
            'expiresAt' => $this->expiresAt,
            'masked' => $this->masked,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
