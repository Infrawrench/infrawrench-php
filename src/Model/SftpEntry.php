<?php

/*
 * infrawrench/sdk v0.1.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.1.1).
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

final class SftpEntry implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly bool $isDir,
        public readonly ?int $size = null,
        public readonly ?string $modifiedAt = null,
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
            name: Coerce::toString($data['name'] ?? null),
            isDir: Coerce::toBool($data['isDir'] ?? null),
            size: Coerce::toIntOrNull($data['size'] ?? null),
            modifiedAt: Coerce::toStringOrNull($data['modifiedAt'] ?? null),
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
            'name' => $this->name,
            'isDir' => $this->isDir,
        ];
        if ($this->size !== null) {
            $payload['size'] = $this->size;
        }
        if ($this->modifiedAt !== null) {
            $payload['modifiedAt'] = $this->modifiedAt;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
