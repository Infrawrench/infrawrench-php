<?php

/*
 * infrawrench/sdk v1.1.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.1.0).
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

final class CreditPot implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string $capabilityLabel The provider's own word for this pot — "Credits", "Balance".
     * @param string $potKey Stable identity for this pot within the account — a currency code, a project id — so successive readings line up into a series.
     * @param float|null $granted What was granted, when the provider reports it.
     * @param string|null $creditExpiresAt Hard expiry on the credit itself, independent of burn.
     * @param float|null $burnPerDay Spend per day over the observed span. **Null means there is not enough history to say** — never 0, which would read as 'nothing is being spent'.
     * @param int $topUps Increases seen between consecutive readings. A top-up is recorded, never netted off the burn — subtracting the endpoints of a window containing one reports a negative burn and an infinite runway.
     * @param bool $neverEmpties Nothing has been spent over the observed span.
     * @param bool $limitedByExpiry The credit's own expiry, not the burn rate, is the binding deadline.
     * @param 'critical'|'warning'|'ok'|'unknown' $urgency
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $capabilityLabel,
        public readonly ?string $topUpUrl,
        public readonly string $potKey,
        public readonly string $label,
        public readonly float $remaining,
        public readonly string $currency,
        public readonly ?float $granted,
        public readonly ?string $creditExpiresAt,
        public readonly string $observedAt,
        public readonly ?float $burnPerDay,
        public readonly float $burnSpanDays,
        public readonly int $observations,
        public readonly int $topUps,
        public readonly ?float $runwayDays,
        public readonly ?string $exhaustedAt,
        public readonly bool $neverEmpties,
        public readonly bool $limitedByExpiry,
        public readonly string $urgency,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            capabilityLabel: Coerce::toString($data['capabilityLabel'] ?? null),
            topUpUrl: Coerce::toStringOrNull($data['topUpUrl'] ?? null),
            potKey: Coerce::toString($data['potKey'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            remaining: Coerce::toFloat($data['remaining'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            granted: Coerce::toFloatOrNull($data['granted'] ?? null),
            creditExpiresAt: Coerce::toStringOrNull($data['creditExpiresAt'] ?? null),
            observedAt: Coerce::toString($data['observedAt'] ?? null),
            burnPerDay: Coerce::toFloatOrNull($data['burnPerDay'] ?? null),
            burnSpanDays: Coerce::toFloat($data['burnSpanDays'] ?? null),
            observations: Coerce::toInt($data['observations'] ?? null),
            topUps: Coerce::toInt($data['topUps'] ?? null),
            runwayDays: Coerce::toFloatOrNull($data['runwayDays'] ?? null),
            exhaustedAt: Coerce::toStringOrNull($data['exhaustedAt'] ?? null),
            neverEmpties: Coerce::toBool($data['neverEmpties'] ?? null),
            limitedByExpiry: Coerce::toBool($data['limitedByExpiry'] ?? null),
            urgency: Coerce::toString($data['urgency'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'capabilityLabel' => $this->capabilityLabel,
            'topUpUrl' => $this->topUpUrl,
            'potKey' => $this->potKey,
            'label' => $this->label,
            'remaining' => $this->remaining,
            'currency' => $this->currency,
            'granted' => $this->granted,
            'creditExpiresAt' => $this->creditExpiresAt,
            'observedAt' => $this->observedAt,
            'burnPerDay' => $this->burnPerDay,
            'burnSpanDays' => $this->burnSpanDays,
            'observations' => $this->observations,
            'topUps' => $this->topUps,
            'runwayDays' => $this->runwayDays,
            'exhaustedAt' => $this->exhaustedAt,
            'neverEmpties' => $this->neverEmpties,
            'limitedByExpiry' => $this->limitedByExpiry,
            'urgency' => $this->urgency,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
