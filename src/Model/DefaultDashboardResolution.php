<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class DefaultDashboardResolution implements \JsonSerializable
{
    /**
     * @param DefaultDashboardSource::* $source
     * @param string|null $userDefaultDashboardId The caller's own pick, whether or not it could be used.
     * @param array{roleId: string, roleName: string, dashboardId: string}|null $roleDefault The role default that applies to the caller. When a member holds several roles, custom roles win over system roles, then owner, admin, member, then role name and id.
     * @param list<'user'|'role'> $skipped Layers that were set but passed over because the dashboard is no longer shared with the caller.
     */
    public function __construct(
        public readonly string $dashboardId,
        public readonly string $dashboardName,
        public readonly string $source,
        public readonly ?string $userDefaultDashboardId,
        public readonly ?array $roleDefault,
        public readonly string $orgDefaultDashboardId,
        public readonly array $skipped,
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
            dashboardId: Coerce::toString($data['dashboardId'] ?? null),
            dashboardName: Coerce::toString($data['dashboardName'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            userDefaultDashboardId: Coerce::toStringOrNull($data['userDefaultDashboardId'] ?? null),
            roleDefault: Coerce::toArrayOrNull($data['roleDefault'] ?? null),
            orgDefaultDashboardId: Coerce::toString($data['orgDefaultDashboardId'] ?? null),
            skipped: Coerce::mapList($data['skipped'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'dashboardId' => $this->dashboardId,
            'dashboardName' => $this->dashboardName,
            'source' => $this->source,
            'userDefaultDashboardId' => $this->userDefaultDashboardId,
            'roleDefault' => $this->roleDefault,
            'orgDefaultDashboardId' => $this->orgDefaultDashboardId,
            'skipped' => $this->skipped,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
