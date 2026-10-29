<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
 * `data` of a `slo.burn_alert` event, version 1. An SLO started or stopped burning its error
 * budget, or exhausted it.
 *
 * Spec schema: `EventData_slo_burn_alert_v1`.
 */
final class EventDataSloBurnAlertV1 implements \JsonSerializable
{
    /**
     * @param string $sloId SLO id.
     * @param string $sloName SLO name.
     * @param 'fast_burn'|'slow_burn'|'recovered'|'exhausted' $status What changed.
     * @param float $targetPercent The SLO target, e.g. 99.9.
     * @param int $windowDays The SLO window in days.
     * @param float|null $sli Current SLI percent over the window.
     * @param float|null $budgetRemaining Fraction of the error budget left (negative when overspent).
     * @param float|null $burnRate1h Burn rate over the last hour.
     * @param float|null $burnRate3d Burn rate over the last three days.
     */
    public function __construct(
        public readonly string $sloId,
        public readonly string $sloName,
        public readonly string $status,
        public readonly float $targetPercent,
        public readonly int $windowDays,
        public readonly ?float $sli,
        public readonly ?float $budgetRemaining,
        public readonly ?float $burnRate1h,
        public readonly ?float $burnRate3d,
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
            sloId: Coerce::toString($data['sloId'] ?? null),
            sloName: Coerce::toString($data['sloName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            targetPercent: Coerce::toFloat($data['targetPercent'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            sli: Coerce::toFloatOrNull($data['sli'] ?? null),
            budgetRemaining: Coerce::toFloatOrNull($data['budgetRemaining'] ?? null),
            burnRate1h: Coerce::toFloatOrNull($data['burnRate1h'] ?? null),
            burnRate3d: Coerce::toFloatOrNull($data['burnRate3d'] ?? null),
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
            'sloId' => $this->sloId,
            'sloName' => $this->sloName,
            'status' => $this->status,
            'targetPercent' => $this->targetPercent,
            'windowDays' => $this->windowDays,
            'sli' => $this->sli,
            'budgetRemaining' => $this->budgetRemaining,
            'burnRate1h' => $this->burnRate1h,
            'burnRate3d' => $this->burnRate3d,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
