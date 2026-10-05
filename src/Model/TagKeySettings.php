<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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

final class TagKeySettings implements \JsonSerializable
{
    /**
     * @param list<string> $hidden Tag keys left out of every tag picker. Each entry is an exact key (`Name`) or a prefix pattern ending in a single `*` (`aws:cloudformation:*`). A lone `*` and a `*` anywhere but the end are rejected. Matching is case-sensitive. Hidden keys' data is untouched: stored, exported, and queryable by a filter naming them.
     * @param list<string> $preferred Exact tag keys pinned to the top of every tag picker, in this order. A key cannot be both hidden and preferred; a preferred key under a hidden prefix stays visible.
     */
    public function __construct(
        public readonly array $hidden,
        public readonly array $preferred,
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
            hidden: Coerce::mapList($data['hidden'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            preferred: Coerce::mapList($data['preferred'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'hidden' => $this->hidden,
            'preferred' => $this->preferred,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
