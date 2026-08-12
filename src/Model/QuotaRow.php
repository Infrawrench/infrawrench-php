<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class QuotaRow implements \JsonSerializable
{
    /**
     * @param string $key Plugin-chosen stable id for this quota within the account.
     * @param PluginId::* $pluginId
     * @param string $service Provider service in the provider's own vocabulary.
     * @param string|null $region Provider region, or null for an account-wide quota. Never the string 'global'.
     * @param float $limit The ceiling the provider will enforce, in `unit`.
     * @param float $used How much of `limit` is consumed, in the same unit.
     * @param float $utilization used / limit. Not clamped at 1 — an over-quota reading is a real state.
     * @param string|null $unit What is being counted, in the provider's own word.
     * @param bool|null $adjustable Whether the provider lets the customer request an increase. Null means the plugin does not know, which is not the same as `false`.
     * @param string|null $docsUrl Provider page explaining or raising this quota.
     * @param string $observedAt When this reading was collected.
     * @param 'exhausted'|'critical'|'trending'|'ok' $severity Where the quota sits: `exhausted` (used >= limit — the provider is already refusing requests), `critical` (at or over the organization's threshold), `trending` (under the threshold, but the fitted trend reaches the limit within 30 days), or `ok`. Ordered: an exhausted quota is also over threshold and also trending, and reports as `exhausted`.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $service,
        public readonly string $name,
        public readonly ?string $region,
        public readonly float $limit,
        public readonly float $used,
        public readonly float $utilization,
        public readonly ?string $unit,
        public readonly ?bool $adjustable,
        public readonly ?string $docsUrl,
        public readonly string $observedAt,
        public readonly string $severity,
        public readonly QuotaTrend $trend,
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
            key: Coerce::toString($data['key'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            service: Coerce::toString($data['service'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            limit: Coerce::toFloat($data['limit'] ?? null),
            used: Coerce::toFloat($data['used'] ?? null),
            utilization: Coerce::toFloat($data['utilization'] ?? null),
            unit: Coerce::toStringOrNull($data['unit'] ?? null),
            adjustable: Coerce::toBoolOrNull($data['adjustable'] ?? null),
            docsUrl: Coerce::toStringOrNull($data['docsUrl'] ?? null),
            observedAt: Coerce::toString($data['observedAt'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            trend: QuotaTrend::fromArray(Coerce::toArray($data['trend'] ?? null)),
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
            'key' => $this->key,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'service' => $this->service,
            'name' => $this->name,
            'region' => $this->region,
            'limit' => $this->limit,
            'used' => $this->used,
            'utilization' => $this->utilization,
            'unit' => $this->unit,
            'adjustable' => $this->adjustable,
            'docsUrl' => $this->docsUrl,
            'observedAt' => $this->observedAt,
            'severity' => $this->severity,
            'trend' => $this->trend->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
