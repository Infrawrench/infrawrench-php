<?php

/*
 * infrawrench/sdk v0.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.20.0).
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

use Infrawrench\Sdk\FileUpload;
use Infrawrench\Sdk\Internal\Coerce;

final class StorageUploadForm implements \JsonSerializable
{
    /** @param FileUpload|string $file Raw file bytes */
    public function __construct(
        public readonly string $accountId,
        public readonly string $bucket,
        public readonly string $key,
        public readonly FileUpload|string $file,
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
            bucket: Coerce::toString($data['bucket'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            file: Coerce::toBytes($data['file'] ?? null),
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
            'accountId' => $this->accountId,
            'bucket' => $this->bucket,
            'key' => $this->key,
            'file' => $this->file,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
