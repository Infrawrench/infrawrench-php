<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

final class BackupCoverageSummary implements \JsonSerializable
{
    /**
     * @param int $statefulCount Stateful resources the plugin declarations can judge.
     * @param int $unprotectedCount Confirmed gaps. Excludes unassessed resources; this is what the digest counts.
     * @param int $unknownCount Resources that could not be assessed: the type declares a provider-native automated-backup signal but this instance's value was absent or unrecognised. Reported separately so 'we found no gap' and 'we could not tell' do not read alike.
     * @param int $unattributableBackupCount Backups whose source could not be determined — the plugin syncs no source field, the field was empty, or more than one resource answered to it. Reported rather than hidden: 'we found no orphans' and 'we could not tell' are different answers.
     * @param float|null $orphanedMonthlyCost Null when billing data is unavailable or the orphans span several currencies.
     * @param float|null $worstRpoHours Largest RPO across resources that have a datable backup at all.
     */
    public function __construct(
        public readonly int $statefulCount,
        public readonly int $protectedCount,
        public readonly int $unprotectedCount,
        public readonly int $unknownCount,
        public readonly int $backupCount,
        public readonly int $orphanedBackupCount,
        public readonly int $unattributableBackupCount,
        public readonly ?float $orphanedGb,
        public readonly ?float $orphanedMonthlyCost,
        public readonly ?string $currency,
        public readonly ?float $worstRpoHours,
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
            statefulCount: Coerce::toInt($data['statefulCount'] ?? null),
            protectedCount: Coerce::toInt($data['protectedCount'] ?? null),
            unprotectedCount: Coerce::toInt($data['unprotectedCount'] ?? null),
            unknownCount: Coerce::toInt($data['unknownCount'] ?? null),
            backupCount: Coerce::toInt($data['backupCount'] ?? null),
            orphanedBackupCount: Coerce::toInt($data['orphanedBackupCount'] ?? null),
            unattributableBackupCount: Coerce::toInt($data['unattributableBackupCount'] ?? null),
            orphanedGb: Coerce::toFloatOrNull($data['orphanedGb'] ?? null),
            orphanedMonthlyCost: Coerce::toFloatOrNull($data['orphanedMonthlyCost'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            worstRpoHours: Coerce::toFloatOrNull($data['worstRpoHours'] ?? null),
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
            'statefulCount' => $this->statefulCount,
            'protectedCount' => $this->protectedCount,
            'unprotectedCount' => $this->unprotectedCount,
            'unknownCount' => $this->unknownCount,
            'backupCount' => $this->backupCount,
            'orphanedBackupCount' => $this->orphanedBackupCount,
            'unattributableBackupCount' => $this->unattributableBackupCount,
            'orphanedGb' => $this->orphanedGb,
            'orphanedMonthlyCost' => $this->orphanedMonthlyCost,
            'currency' => $this->currency,
            'worstRpoHours' => $this->worstRpoHours,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
