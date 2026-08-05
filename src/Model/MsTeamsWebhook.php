<?php

/*
 * infrawrench/sdk v0.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.33.0).
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

final class MsTeamsWebhook implements \JsonSerializable
{
    /**
     * @param string $label Display name for the channel, e.g. #alerts
     * @param string $urlHint Non-secret hint at the stored webhook URL (host and last four characters). The URL itself is never returned.
     * @param bool $anomalyAlerts Statistical spend-spike (cost anomaly) alerts
     * @param bool $metricAlerts Metric threshold rule firings and recoveries
     * @param bool $resourceDrift Batched resource-drift digests from the change timeline. Defaults to false when a channel is added — drift is continuous where the other triggers are exceptional.
     * @param bool $workflowPages Pages and approval requests raised by a workflow (infra.page / infra.waitForApproval) or by POST /pages
     * @param bool $providerIncidents A provider status-page incident overlaps resources you hold.
     * @param bool $expiryAlerts Daily digests of approaching resource deadlines — expiring certificates, domains, tokens and keys past their rotation budget.
     * @param bool $logMatchAlerts A saved log-workspace query with alerting enabled found matching log lines.
     * @param bool $postureAlerts Daily digests of critical/high security posture findings on synced resources — public buckets, world-open ingress, unencrypted disks.
     * @param bool $probeAlerts A synthetic probe crossed its consecutive-failure threshold (down) or answered again (recovered).
     * @param bool $weeklyDigest The Monday-morning weekly digest. Only sends when the organization has enabled the digest (see /digest).
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly string $urlHint,
        public readonly bool $syncIncidents,
        public readonly bool $budgetAlerts,
        public readonly bool $anomalyAlerts,
        public readonly bool $metricAlerts,
        public readonly bool $resourceDrift,
        public readonly bool $workflowPages,
        public readonly bool $providerIncidents,
        public readonly bool $expiryAlerts,
        public readonly bool $logMatchAlerts,
        public readonly bool $postureAlerts,
        public readonly bool $probeAlerts,
        public readonly bool $weeklyDigest,
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
            label: Coerce::toString($data['label'] ?? null),
            urlHint: Coerce::toString($data['urlHint'] ?? null),
            syncIncidents: Coerce::toBool($data['syncIncidents'] ?? null),
            budgetAlerts: Coerce::toBool($data['budgetAlerts'] ?? null),
            anomalyAlerts: Coerce::toBool($data['anomalyAlerts'] ?? null),
            metricAlerts: Coerce::toBool($data['metricAlerts'] ?? null),
            resourceDrift: Coerce::toBool($data['resourceDrift'] ?? null),
            workflowPages: Coerce::toBool($data['workflowPages'] ?? null),
            providerIncidents: Coerce::toBool($data['providerIncidents'] ?? null),
            expiryAlerts: Coerce::toBool($data['expiryAlerts'] ?? null),
            logMatchAlerts: Coerce::toBool($data['logMatchAlerts'] ?? null),
            postureAlerts: Coerce::toBool($data['postureAlerts'] ?? null),
            probeAlerts: Coerce::toBool($data['probeAlerts'] ?? null),
            weeklyDigest: Coerce::toBool($data['weeklyDigest'] ?? null),
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
            'label' => $this->label,
            'urlHint' => $this->urlHint,
            'syncIncidents' => $this->syncIncidents,
            'budgetAlerts' => $this->budgetAlerts,
            'anomalyAlerts' => $this->anomalyAlerts,
            'metricAlerts' => $this->metricAlerts,
            'resourceDrift' => $this->resourceDrift,
            'workflowPages' => $this->workflowPages,
            'providerIncidents' => $this->providerIncidents,
            'expiryAlerts' => $this->expiryAlerts,
            'logMatchAlerts' => $this->logMatchAlerts,
            'postureAlerts' => $this->postureAlerts,
            'probeAlerts' => $this->probeAlerts,
            'weeklyDigest' => $this->weeklyDigest,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
