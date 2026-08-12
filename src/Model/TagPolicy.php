<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class TagPolicy implements \JsonSerializable
{
    /**
     * @param list<RequiredTag> $requiredTags
     * @param bool $enforceOnCreate When true, resource creation is rejected with a 422 (`tag_policy_unmet`) if the submitted fields carry a tag map missing a required tag. Types whose create form has no `tags`/`labels` field are exempt.
     */
    public function __construct(
        public readonly array $requiredTags,
        public readonly bool $enforceOnCreate,
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
            requiredTags: Coerce::mapList($data['requiredTags'] ?? null, static fn (mixed $item): RequiredTag => RequiredTag::fromArray(Coerce::toArray($item))),
            enforceOnCreate: Coerce::toBool($data['enforceOnCreate'] ?? null),
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
            'requiredTags' => array_map(static fn (RequiredTag $item): array => $item->toArray(), $this->requiredTags),
            'enforceOnCreate' => $this->enforceOnCreate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
