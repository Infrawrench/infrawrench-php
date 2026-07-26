<?php

/*
 * infrawrench/sdk v0.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.2.0).
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
    public function __construct(
        public readonly string $key,
        public readonly ?int $size = null,
        public readonly ?bool $isFolder = null,
        public readonly ?string $lastModified = null,
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
            size: Coerce::toIntOrNull($data['size'] ?? null),
            isFolder: Coerce::toBoolOrNull($data['isFolder'] ?? null),
            lastModified: Coerce::toStringOrNull($data['lastModified'] ?? null),
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
        ];
        if ($this->size !== null) {
            $payload['size'] = $this->size;
        }
        if ($this->isFolder !== null) {
            $payload['isFolder'] = $this->isFolder;
        }
        if ($this->lastModified !== null) {
            $payload['lastModified'] = $this->lastModified;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
