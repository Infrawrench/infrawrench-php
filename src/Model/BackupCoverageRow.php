<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class BackupCoverageRow implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'protected'|'automated'|'stale'|'unknown'|'unprotected' $state How the resource reads at a glance. `automated` means the provider is taking backups we cannot enumerate, so there is a restore point but no listable one. `unknown` means the resource type declares a provider-native automated-backup signal but this instance's value could not be read — it is unassessed, not a confirmed gap, and never produces a finding.
     * @param int $backupCount Backups in the inventory that protect this resource.
     * @param bool|null $automatedBackups Whether provider-native automated backups are on. Null means the plugin syncs no signal either way — which never counts as protection and never counts as a fault.
     * @param string|null $rpoPolicyId The policy supplying `maxRpoHours` — the strictest RPO among those selecting this resource. Tracked separately from the retention policy because the two strictest demands routinely come from different policies.
     * @param string|null $retentionPolicyId The policy supplying `minRetentionDays`.
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
        public readonly string $state,
        public readonly int $backupCount,
        public readonly ?string $latestBackupId,
        public readonly ?string $latestBackupName,
        public readonly ?string $latestBackupAt,
        public readonly ?float $rpoHours,
        public readonly ?bool $automatedBackups,
        public readonly ?float $retentionDays,
        public readonly ?string $rpoPolicyId,
        public readonly ?string $rpoPolicyName,
        public readonly ?string $retentionPolicyId,
        public readonly ?string $retentionPolicyName,
        public readonly ?int $maxRpoHours,
        public readonly ?int $minRetentionDays,
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
            state: Coerce::toString($data['state'] ?? null),
            backupCount: Coerce::toInt($data['backupCount'] ?? null),
            latestBackupId: Coerce::toStringOrNull($data['latestBackupId'] ?? null),
            latestBackupName: Coerce::toStringOrNull($data['latestBackupName'] ?? null),
            latestBackupAt: Coerce::toStringOrNull($data['latestBackupAt'] ?? null),
            rpoHours: Coerce::toFloatOrNull($data['rpoHours'] ?? null),
            automatedBackups: Coerce::toBoolOrNull($data['automatedBackups'] ?? null),
            retentionDays: Coerce::toFloatOrNull($data['retentionDays'] ?? null),
            rpoPolicyId: Coerce::toStringOrNull($data['rpoPolicyId'] ?? null),
            rpoPolicyName: Coerce::toStringOrNull($data['rpoPolicyName'] ?? null),
            retentionPolicyId: Coerce::toStringOrNull($data['retentionPolicyId'] ?? null),
            retentionPolicyName: Coerce::toStringOrNull($data['retentionPolicyName'] ?? null),
            maxRpoHours: Coerce::toIntOrNull($data['maxRpoHours'] ?? null),
            minRetentionDays: Coerce::toIntOrNull($data['minRetentionDays'] ?? null),
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
            'state' => $this->state,
            'backupCount' => $this->backupCount,
            'latestBackupId' => $this->latestBackupId,
            'latestBackupName' => $this->latestBackupName,
            'latestBackupAt' => $this->latestBackupAt,
            'rpoHours' => $this->rpoHours,
            'automatedBackups' => $this->automatedBackups,
            'retentionDays' => $this->retentionDays,
            'rpoPolicyId' => $this->rpoPolicyId,
            'rpoPolicyName' => $this->rpoPolicyName,
            'retentionPolicyId' => $this->retentionPolicyId,
            'retentionPolicyName' => $this->retentionPolicyName,
            'maxRpoHours' => $this->maxRpoHours,
            'minRetentionDays' => $this->minRetentionDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
