<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class AgentLinkInfo implements \JsonSerializable
{
    /**
     * @param list<string> $scopes The ceiling as approved.
     * @param list<string> $effectiveScopes The ceiling as it stands now: approved ∩ the approver's current role (no elevation) − permissions no agent may hold. Agents can only be granted scopes from here.
     * @param list<string> $narrowableScopes The scopes in `effectiveScopes` that `providers` can limit (resources, secrets, object storage). An agent given `providers` may hold only these; any other scope is a `scope_not_allowed`, because it would stay organization-wide.
     * @param list<AgentLinkScopeGroup> $scopeGroups `effectiveScopes` grouped and labelled as the Infrawrench pickers show them.
     * @param list<AgentLinkProvider> $providers Plugins the organization has at least one connected account for.
     * @param array{email: string}|null $approvedBy
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $organizationName,
        public readonly string $platform,
        public readonly string $label,
        public readonly array $scopes,
        public readonly array $effectiveScopes,
        public readonly array $narrowableScopes,
        public readonly array $scopeGroups,
        public readonly array $providers,
        public readonly ?array $approvedBy,
        public readonly string $createdAt,
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
            id: Coerce::toString($data['id'] ?? null),
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            organizationName: Coerce::toString($data['organizationName'] ?? null),
            platform: Coerce::toString($data['platform'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            scopes: Coerce::mapList($data['scopes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            effectiveScopes: Coerce::mapList($data['effectiveScopes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            narrowableScopes: Coerce::mapList($data['narrowableScopes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            scopeGroups: Coerce::mapList($data['scopeGroups'] ?? null, static fn (mixed $item): AgentLinkScopeGroup => AgentLinkScopeGroup::fromArray(Coerce::toArray($item))),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): AgentLinkProvider => AgentLinkProvider::fromArray(Coerce::toArray($item))),
            approvedBy: Coerce::toArrayOrNull($data['approvedBy'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'id' => $this->id,
            'organizationId' => $this->organizationId,
            'organizationName' => $this->organizationName,
            'platform' => $this->platform,
            'label' => $this->label,
            'scopes' => $this->scopes,
            'effectiveScopes' => $this->effectiveScopes,
            'narrowableScopes' => $this->narrowableScopes,
            'scopeGroups' => array_map(static fn (AgentLinkScopeGroup $item): array => $item->toArray(), $this->scopeGroups),
            'providers' => array_map(static fn (AgentLinkProvider $item): array => $item->toArray(), $this->providers),
            'approvedBy' => $this->approvedBy,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
