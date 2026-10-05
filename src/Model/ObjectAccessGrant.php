<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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

final class ObjectAccessGrant implements \JsonSerializable
{
    /**
     * @param 'member'|'role' $principalKind
     * @param ObjectAccessLevel::* $level
     * @param bool $implicit The report creator's ownership, implied rather than stored. Never send it back.
     */
    public function __construct(
        public readonly string $principalKind,
        public readonly string $principalId,
        public readonly ?string $principalLabel,
        public readonly string $level,
        public readonly bool $implicit,
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
            principalKind: Coerce::toString($data['principalKind'] ?? null),
            principalId: Coerce::toString($data['principalId'] ?? null),
            principalLabel: Coerce::toStringOrNull($data['principalLabel'] ?? null),
            level: Coerce::toString($data['level'] ?? null),
            implicit: Coerce::toBool($data['implicit'] ?? null),
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
            'principalKind' => $this->principalKind,
            'principalId' => $this->principalId,
            'principalLabel' => $this->principalLabel,
            'level' => $this->level,
            'implicit' => $this->implicit,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
