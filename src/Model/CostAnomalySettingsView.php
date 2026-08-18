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

final class CostAnomalySettingsView implements \JsonSerializable
{
    /**
     * @param float $sigmas Standard deviations above a key's own trailing mean that count as a spike. Lower is more sensitive. Bounded at 1 — below that roughly a third of ordinary days clear the bar — and at 10, above which nothing short of a 10x jump fires. Defaults to 3.
     * @param int $minDeltaCents Minimum rise over the baseline mean before a spike alerts, in USD cents (converted per series, so it means the same real amount in every currency). Defaults to 1000 ($10).
     * @param int $newSourceMinCents Minimum first-day spend before a new spend source alerts, in USD cents. A key with no prior spend has no statistical bar to clear, so this absolute floor is the only thing keeping a new $0.02/day service quiet. Defaults to 2500 ($25).
     * @param 'off'|'new_source'|'all' $smsAlerts Which anomalies also text the organization's Twilio recipients. Defaults to `off` — an organization with Twilio configured for budgets does not start receiving anomaly texts until it asks to. `new_source` texts only about spend appearing from nothing, which is what a leaked key looks like on a bill; `all` adds spikes on existing lines. Delivery is batched — one SMS per detection pass summarizing what it alerted on, at most one every six hours per organization — and never places a voice call. Push, Slack and Teams delivery is unaffected by this setting.
     * @param bool $smsConfigured Whether an SMS raised right now could be delivered: paging enabled for the organization, Twilio credentials and a from-number stored, and at least one recipient opted into SMS. Read-only and derived — it is not accepted on PUT.
     */
    public function __construct(
        public readonly float $sigmas,
        public readonly int $minDeltaCents,
        public readonly int $newSourceMinCents,
        public readonly string $smsAlerts,
        public readonly bool $smsConfigured,
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
            sigmas: Coerce::toFloat($data['sigmas'] ?? null),
            minDeltaCents: Coerce::toInt($data['minDeltaCents'] ?? null),
            newSourceMinCents: Coerce::toInt($data['newSourceMinCents'] ?? null),
            smsAlerts: Coerce::toString($data['smsAlerts'] ?? null),
            smsConfigured: Coerce::toBool($data['smsConfigured'] ?? null),
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
            'sigmas' => $this->sigmas,
            'minDeltaCents' => $this->minDeltaCents,
            'newSourceMinCents' => $this->newSourceMinCents,
            'smsAlerts' => $this->smsAlerts,
            'smsConfigured' => $this->smsConfigured,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
