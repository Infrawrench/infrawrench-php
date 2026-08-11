<?php

/*
 * infrawrench/sdk v1.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.9.0).
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

final class StorageObject implements \JsonSerializable
{
    /**
     * @param string $key Full path within the bucket.
     * @param string $name Last path segment — what the browser renders.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly float $size,
        public readonly string $lastModified,
        public readonly bool $isDirectory,
        public readonly ?string $contentType = null,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            size: Coerce::toFloat($data['size'] ?? null),
            lastModified: Coerce::toString($data['lastModified'] ?? null),
            isDirectory: Coerce::toBool($data['isDirectory'] ?? null),
            contentType: Coerce::toStringOrNull($data['contentType'] ?? null),
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
            'key' => $this->key,
            'name' => $this->name,
            'size' => $this->size,
            'lastModified' => $this->lastModified,
            'isDirectory' => $this->isDirectory,
        ];
        if ($this->contentType !== null) {
            $payload['contentType'] = $this->contentType;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
