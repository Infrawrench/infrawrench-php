<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class AccessRequestCatalog implements \JsonSerializable
{
    /**
     * @param list<string> $permissions
     * @param list<string> $held Permissions the caller already holds; asking for these changes nothing.
     */
    public function __construct(
        public readonly array $permissions,
        public readonly array $held,
        public readonly int $minGrantMinutes,
        public readonly int $maxGrantMinutes,
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
            held: Coerce::mapList($data['held'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            minGrantMinutes: Coerce::toInt($data['minGrantMinutes'] ?? null),
            maxGrantMinutes: Coerce::toInt($data['maxGrantMinutes'] ?? null),
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
            'held' => $this->held,
            'minGrantMinutes' => $this->minGrantMinutes,
            'maxGrantMinutes' => $this->maxGrantMinutes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
