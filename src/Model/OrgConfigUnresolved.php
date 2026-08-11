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

/**
 * Something the document asked for that this organization could not satisfy — a pin for a resource
 * nobody has synced, an account name that does not exist here. Not fatal: the affected card,
 * clause or deletion is dropped and the rest of the document still applies.
 */
final class OrgConfigUnresolved implements \JsonSerializable
{
    /** @param OrgConfigSection::* $section */
    public function __construct(
        public readonly string $section,
        public readonly string $key,
        public readonly string $detail,
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
            section: Coerce::toString($data['section'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            detail: Coerce::toString($data['detail'] ?? null),
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
            'section' => $this->section,
            'key' => $this->key,
            'detail' => $this->detail,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
