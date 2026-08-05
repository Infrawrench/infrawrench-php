<?php

/*
 * infrawrench/sdk v0.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.35.0).
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

final class MsTeamsWebhookCreate implements \JsonSerializable
{
    /**
     * @param string $url The webhook URL from a Teams 'Workflows' automation. Must be https and on a Microsoft-operated host (*.api.powerautomate.com, *.api.powerplatform.com, *.logic.azure.com, *.flow.microsoft.com, or a legacy *.webhook.office.com connector).
     */
    public function __construct(
        public readonly string $label,
        public readonly string $url,
        public readonly ?bool $syncIncidents = null,
        public readonly ?bool $budgetAlerts = null,
        public readonly ?bool $anomalyAlerts = null,
        public readonly ?bool $metricAlerts = null,
        public readonly ?bool $resourceDrift = null,
        public readonly ?bool $workflowPages = null,
        public readonly ?bool $providerIncidents = null,
        public readonly ?bool $expiryAlerts = null,
        public readonly ?bool $logMatchAlerts = null,
        public readonly ?bool $postureAlerts = null,
        public readonly ?bool $probeAlerts = null,
        public readonly ?bool $weeklyDigest = null,
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
            label: Coerce::toString($data['label'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
            syncIncidents: Coerce::toBoolOrNull($data['syncIncidents'] ?? null),
            budgetAlerts: Coerce::toBoolOrNull($data['budgetAlerts'] ?? null),
            anomalyAlerts: Coerce::toBoolOrNull($data['anomalyAlerts'] ?? null),
            metricAlerts: Coerce::toBoolOrNull($data['metricAlerts'] ?? null),
            resourceDrift: Coerce::toBoolOrNull($data['resourceDrift'] ?? null),
            workflowPages: Coerce::toBoolOrNull($data['workflowPages'] ?? null),
            providerIncidents: Coerce::toBoolOrNull($data['providerIncidents'] ?? null),
            expiryAlerts: Coerce::toBoolOrNull($data['expiryAlerts'] ?? null),
            logMatchAlerts: Coerce::toBoolOrNull($data['logMatchAlerts'] ?? null),
            postureAlerts: Coerce::toBoolOrNull($data['postureAlerts'] ?? null),
            probeAlerts: Coerce::toBoolOrNull($data['probeAlerts'] ?? null),
            weeklyDigest: Coerce::toBoolOrNull($data['weeklyDigest'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'label' => $this->label,
            'url' => $this->url,
        ];
        if ($this->syncIncidents !== null) {
            $payload['syncIncidents'] = $this->syncIncidents;
        }
        if ($this->budgetAlerts !== null) {
            $payload['budgetAlerts'] = $this->budgetAlerts;
        }
        if ($this->anomalyAlerts !== null) {
            $payload['anomalyAlerts'] = $this->anomalyAlerts;
        }
        if ($this->metricAlerts !== null) {
            $payload['metricAlerts'] = $this->metricAlerts;
        }
        if ($this->resourceDrift !== null) {
            $payload['resourceDrift'] = $this->resourceDrift;
        }
        if ($this->workflowPages !== null) {
            $payload['workflowPages'] = $this->workflowPages;
        }
        if ($this->providerIncidents !== null) {
            $payload['providerIncidents'] = $this->providerIncidents;
        }
        if ($this->expiryAlerts !== null) {
            $payload['expiryAlerts'] = $this->expiryAlerts;
        }
        if ($this->logMatchAlerts !== null) {
            $payload['logMatchAlerts'] = $this->logMatchAlerts;
        }
        if ($this->postureAlerts !== null) {
            $payload['postureAlerts'] = $this->postureAlerts;
        }
        if ($this->probeAlerts !== null) {
            $payload['probeAlerts'] = $this->probeAlerts;
        }
        if ($this->weeklyDigest !== null) {
            $payload['weeklyDigest'] = $this->weeklyDigest;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
