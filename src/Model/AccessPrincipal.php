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

final class AccessPrincipal implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id.
     * @param PluginId::* $pluginId
     * @param string|null $externalId Provider-native id, when known.
     * @param 'user'|'group'|'role'|'service-account'|'key'|'binding' $role What kind of identity the principal is, from the resource type's `principalRole` declaration. Grouping and labels only — it is not a permission model.
     * @param string|null $lastUsedAt When the principal was last used, or null when the review has no evidence.
     * @param 'active'|'stale'|'unknown' $activity What could be established about the principal's last use. `unknown` means the resource type declares no last-used field, or the provider stored nothing parseable — it is a first-class answer and is never reported as `stale`.
     * @param bool|null $admin True when the type's declared admin indicator matched; null when the type declares none.
     * @param bool|null $mfa Multi-factor state, only on types that declare an MFA field. Null everywhere else — "not synced" is not "MFA is off".
     * @param string|null $parent The principal this one hangs off — a key's owner, a binding's subject.
     * @param string|null $revokeActionId The plugin action that revokes this principal, when the type declares one. Dispatch it through POST /resources/invoke-action; null means the provider offers no revocation Infrawrench can invoke.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly string $role,
        public readonly ?string $lastUsedAt,
        public readonly ?int $daysSinceLastUsed,
        public readonly string $activity,
        public readonly ?string $createdAt,
        public readonly ?int $ageDays,
        public readonly ?bool $admin,
        public readonly ?bool $mfa,
        public readonly ?string $parent,
        public readonly ?AccessPrincipalOwner $owner,
        public readonly ?string $revokeActionId,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            role: Coerce::toString($data['role'] ?? null),
            lastUsedAt: Coerce::toStringOrNull($data['lastUsedAt'] ?? null),
            daysSinceLastUsed: Coerce::toIntOrNull($data['daysSinceLastUsed'] ?? null),
            activity: Coerce::toString($data['activity'] ?? null),
            createdAt: Coerce::toStringOrNull($data['createdAt'] ?? null),
            ageDays: Coerce::toIntOrNull($data['ageDays'] ?? null),
            admin: Coerce::toBoolOrNull($data['admin'] ?? null),
            mfa: Coerce::toBoolOrNull($data['mfa'] ?? null),
            parent: Coerce::toStringOrNull($data['parent'] ?? null),
            owner: Coerce::nullable($data['owner'] ?? null, static fn (mixed $value): AccessPrincipalOwner => AccessPrincipalOwner::fromArray(Coerce::toArray($value))),
            revokeActionId: Coerce::toStringOrNull($data['revokeActionId'] ?? null),
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
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'role' => $this->role,
            'lastUsedAt' => $this->lastUsedAt,
            'daysSinceLastUsed' => $this->daysSinceLastUsed,
            'activity' => $this->activity,
            'createdAt' => $this->createdAt,
            'ageDays' => $this->ageDays,
            'admin' => $this->admin,
            'mfa' => $this->mfa,
            'parent' => $this->parent,
            'owner' => $this->owner?->toArray(),
            'revokeActionId' => $this->revokeActionId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
