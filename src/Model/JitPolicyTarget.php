<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class JitPolicyTarget implements \JsonSerializable
{
    /**
     * @param string $scopeId Provider id of the scope (account, project, namespace).
     * @param string $roleId Provider id of the role (permission set ARN, role name).
     */
    public function __construct(
        public readonly string $scopeId,
        public readonly string $scopeName,
        public readonly string $roleId,
        public readonly string $roleName,
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
            scopeId: Coerce::toString($data['scopeId'] ?? null),
            scopeName: Coerce::toString($data['scopeName'] ?? null),
            roleId: Coerce::toString($data['roleId'] ?? null),
            roleName: Coerce::toString($data['roleName'] ?? null),
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
            'scopeId' => $this->scopeId,
            'scopeName' => $this->scopeName,
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
