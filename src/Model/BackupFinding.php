<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class BackupFinding implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id the finding is on.
     * @param PluginId::* $pluginId
     * @param string|null $externalId Provider-native id, when known.
     * @param 'unprotected'|'rpo-breach'|'retention-below-policy'|'orphaned-snapshot' $kind What the finding describes: nothing protects the resource; the newest backup is older than the policy's RPO; the provider-native retention window is shorter than the policy asks; or a backup whose source resource no longer exists.
     * @param 'critical'|'high'|'medium'|'low' $severity How bad the gap is. Orphaned backups are always `low` — they cost money, not data.
     * @param string $detail Sentence explaining the gap and what would close it.
     * @param string|null $policyId The policy supplying the objective this finding breaches — the RPO policy for `rpo-breach`, the retention policy for `retention-below-policy`. Null when no policy applies.
     * @param float|null $rpoHours Hours since the newest backup protecting the resource; null when there is none.
     * @param int|null $maxRpoHours The policy's allowance, when one applied.
     * @param float|null $retentionDays Provider-native retention window in days, when the plugin syncs one.
     * @param float|null $sizeGb Size of an orphaned backup in GiB, when the plugin syncs one.
     * @param float|null $monthlyCost Trailing-30-day spend on an orphaned backup. Null means the cost could not be determined — never that the backup is free.
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
        public readonly string $kind,
        public readonly string $severity,
        public readonly string $title,
        public readonly string $detail,
        public readonly ?string $policyId,
        public readonly ?string $policyName,
        public readonly ?float $rpoHours,
        public readonly ?int $maxRpoHours,
        public readonly ?float $retentionDays,
        public readonly ?int $minRetentionDays,
        public readonly ?string $latestBackupId,
        public readonly ?string $latestBackupName,
        public readonly ?string $latestBackupAt,
        public readonly ?float $sizeGb,
        public readonly ?float $monthlyCost,
        public readonly ?string $currency,
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
            kind: Coerce::toString($data['kind'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            detail: Coerce::toString($data['detail'] ?? null),
            policyId: Coerce::toStringOrNull($data['policyId'] ?? null),
            policyName: Coerce::toStringOrNull($data['policyName'] ?? null),
            rpoHours: Coerce::toFloatOrNull($data['rpoHours'] ?? null),
            maxRpoHours: Coerce::toIntOrNull($data['maxRpoHours'] ?? null),
            retentionDays: Coerce::toFloatOrNull($data['retentionDays'] ?? null),
            minRetentionDays: Coerce::toIntOrNull($data['minRetentionDays'] ?? null),
            latestBackupId: Coerce::toStringOrNull($data['latestBackupId'] ?? null),
            latestBackupName: Coerce::toStringOrNull($data['latestBackupName'] ?? null),
            latestBackupAt: Coerce::toStringOrNull($data['latestBackupAt'] ?? null),
            sizeGb: Coerce::toFloatOrNull($data['sizeGb'] ?? null),
            monthlyCost: Coerce::toFloatOrNull($data['monthlyCost'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
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
            'kind' => $this->kind,
            'severity' => $this->severity,
            'title' => $this->title,
            'detail' => $this->detail,
            'policyId' => $this->policyId,
            'policyName' => $this->policyName,
            'rpoHours' => $this->rpoHours,
            'maxRpoHours' => $this->maxRpoHours,
            'retentionDays' => $this->retentionDays,
            'minRetentionDays' => $this->minRetentionDays,
            'latestBackupId' => $this->latestBackupId,
            'latestBackupName' => $this->latestBackupName,
            'latestBackupAt' => $this->latestBackupAt,
            'sizeGb' => $this->sizeGb,
            'monthlyCost' => $this->monthlyCost,
            'currency' => $this->currency,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
