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

final class AccessRequestCreate implements \JsonSerializable
{
    /** @param list<string> $permissions */
    public function __construct(
        public readonly array $permissions,
        public readonly string $reason,
        public readonly int $durationMinutes,
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
            permissions: Coerce::mapList($data['permissions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            reason: Coerce::toString($data['reason'] ?? null),
            durationMinutes: Coerce::toInt($data['durationMinutes'] ?? null),
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
            'permissions' => $this->permissions,
            'reason' => $this->reason,
            'durationMinutes' => $this->durationMinutes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
