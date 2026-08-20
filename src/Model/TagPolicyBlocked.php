<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class TagPolicyBlocked implements \JsonSerializable
{
    /**
     * @param 'tag_policy_unmet' $code
     * @param list<TagPolicyViolation> $violations
     * @param list<RequiredTag> $requiredTags
     */
    public function __construct(
        public readonly string $error,
        public readonly string $code,
        public readonly array $violations,
        public readonly array $requiredTags,
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
            error: Coerce::toString($data['error'] ?? null),
            code: Coerce::toString($data['code'] ?? null),
            violations: Coerce::mapList($data['violations'] ?? null, static fn (mixed $item): TagPolicyViolation => TagPolicyViolation::fromArray(Coerce::toArray($item))),
            requiredTags: Coerce::mapList($data['requiredTags'] ?? null, static fn (mixed $item): RequiredTag => RequiredTag::fromArray(Coerce::toArray($item))),
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
            'error' => $this->error,
            'code' => $this->code,
            'violations' => array_map(static fn (TagPolicyViolation $item): array => $item->toArray(), $this->violations),
            'requiredTags' => array_map(static fn (RequiredTag $item): array => $item->toArray(), $this->requiredTags),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
