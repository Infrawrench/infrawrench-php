<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

/**
 * Set only when classification is "dangling".
 *
 * The API may send `null` in place of this object.
 */
final class DnsTargetService implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'critical'|'high'|'medium'|'low' $severity
     * @param string $reason Plugin-authored note on what claiming the name gets an attacker.
     * @param string $claimLabel The instance-identifying part of the hostname, e.g. the bucket or app name.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $ruleId,
        public readonly string $label,
        public readonly string $severity,
        public readonly string $reason,
        public readonly string $claimLabel,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            claimLabel: Coerce::toString($data['claimLabel'] ?? null),
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
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'ruleId' => $this->ruleId,
            'label' => $this->label,
            'severity' => $this->severity,
            'reason' => $this->reason,
            'claimLabel' => $this->claimLabel,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
