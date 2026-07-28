<?php

/*
 * infrawrench/sdk v0.9.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.9.0).
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

final class CredentialExport implements \JsonSerializable
{
    /**
     * @param list<array{label: string, value: string, sensitive?: bool, hint?: string}>|null $fields
     */
    public function __construct(
        public readonly string $content,
        public readonly string $filename,
        public readonly string $mimeType,
        public readonly ?array $fields = null,
        public readonly ?string $warning = null,
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
            content: Coerce::toString($data['content'] ?? null),
            filename: Coerce::toString($data['filename'] ?? null),
            mimeType: Coerce::toString($data['mimeType'] ?? null),
            fields: Coerce::nullable($data['fields'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            warning: Coerce::toStringOrNull($data['warning'] ?? null),
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
            'content' => $this->content,
            'filename' => $this->filename,
            'mimeType' => $this->mimeType,
        ];
        if ($this->fields !== null) {
            $payload['fields'] = $this->fields;
        }
        if ($this->warning !== null) {
            $payload['warning'] = $this->warning;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
