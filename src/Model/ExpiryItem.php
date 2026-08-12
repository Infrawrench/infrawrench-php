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

final class ExpiryItem implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id.
     * @param PluginId::* $pluginId
     * @param string|null $externalId Provider-native id, when known.
     * @param string $fieldKey The declared field the deadline came from.
     * @param 'tls-cert'|'domain'|'api-token'|'access-key'|'k8s-cert'|'ssh-key'|'secret-version'|'other' $kind Grouping bucket for the kind of deadline.
     * @param string $label Plugin-authored caption for the deadline.
     * @param 'expiry'|'age' $basis `expiry` — the field held the deadline itself; `age` — the deadline was derived from a creation/rotation date plus an age budget.
     * @param string $dueAt The deadline.
     * @param int $daysRemaining Whole days until dueAt (floor); negative once expired.
     * @param 'expired'|'critical'|'warning'|'upcoming'|'ok' $severity How close the deadline is: `expired` (in the past), `critical` (due within 7 days), `warning` (within 30 days), `upcoming` (within the organization's lead time), or `ok` (tracked, but further out than the lead time).
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
        public readonly string $fieldKey,
        public readonly string $kind,
        public readonly string $label,
        public readonly string $basis,
        public readonly string $dueAt,
        public readonly int $daysRemaining,
        public readonly string $severity,
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
            fieldKey: Coerce::toString($data['fieldKey'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            basis: Coerce::toString($data['basis'] ?? null),
            dueAt: Coerce::toString($data['dueAt'] ?? null),
            daysRemaining: Coerce::toInt($data['daysRemaining'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
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
            'fieldKey' => $this->fieldKey,
            'kind' => $this->kind,
            'label' => $this->label,
            'basis' => $this->basis,
            'dueAt' => $this->dueAt,
            'daysRemaining' => $this->daysRemaining,
            'severity' => $this->severity,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
