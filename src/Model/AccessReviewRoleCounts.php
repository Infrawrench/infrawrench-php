<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class AccessReviewRoleCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $user,
        public readonly int $group,
        public readonly int $role,
        public readonly int $serviceAccount,
        public readonly int $key,
        public readonly int $binding,
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
            user: Coerce::toInt($data['user'] ?? null),
            group: Coerce::toInt($data['group'] ?? null),
            role: Coerce::toInt($data['role'] ?? null),
            serviceAccount: Coerce::toInt($data['service-account'] ?? null),
            key: Coerce::toInt($data['key'] ?? null),
            binding: Coerce::toInt($data['binding'] ?? null),
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
            'user' => $this->user,
            'group' => $this->group,
            'role' => $this->role,
            'service-account' => $this->serviceAccount,
            'key' => $this->key,
            'binding' => $this->binding,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
