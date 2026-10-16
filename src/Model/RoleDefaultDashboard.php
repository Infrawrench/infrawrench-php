<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class RoleDefaultDashboard implements \JsonSerializable
{
    /**
     * @param string|null $dashboardId Null when the role has no default and its members fall through to the organization default.
     */
    public function __construct(
        public readonly string $roleId,
        public readonly string $roleName,
        public readonly bool $isSystem,
        public readonly ?string $systemKey,
        public readonly ?string $dashboardId,
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
            roleId: Coerce::toString($data['roleId'] ?? null),
            roleName: Coerce::toString($data['roleName'] ?? null),
            isSystem: Coerce::toBool($data['isSystem'] ?? null),
            systemKey: Coerce::toStringOrNull($data['systemKey'] ?? null),
            dashboardId: Coerce::toStringOrNull($data['dashboardId'] ?? null),
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
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
            'isSystem' => $this->isSystem,
            'systemKey' => $this->systemKey,
            'dashboardId' => $this->dashboardId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
