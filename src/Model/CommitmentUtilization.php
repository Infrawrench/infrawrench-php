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

final class CommitmentUtilization implements \JsonSerializable
{
    /**
     * @param float|null $utilization delivered ÷ obligation, unclamped (values above 1 mean spend past the commitment). **Null means not measurable** — never 0, which would read as 'unused'; the reason field says why.
     * @param float|null $obligationAmount hourlyCommitmentAmount × 24 × measuredDays, in the commitment's currency.
     * @param int $activeDays Days of the window the commitment was active.
     * @param int $measuredDays Active days with cost data — the only days in the obligation. Counting a day the collection never ran would make a fully-used plan read as under-utilized.
     * @param int $missingDays Active days without cost data, reported rather than silently counted.
     * @param 'unit_denominated'|'no_active_days'|'no_data_days'|'unattributed_rows'|null $reason Why utilization is null: `unit_denominated` — the commitment is in resource units (GCP CUDs) and cost rows cannot say how many ran; `no_active_days` — the term does not intersect the window; `no_data_days` — no cost data was collected on any active day; `unattributed_rows` — the account's plugin does not stamp commitment ids onto cost rows, so delivered spend would falsely read as zero.
     */
    public function __construct(
        public readonly ?float $utilization,
        public readonly ?float $obligationAmount,
        public readonly float $deliveredAmount,
        public readonly int $activeDays,
        public readonly int $measuredDays,
        public readonly int $missingDays,
        public readonly int $windowDays,
        public readonly ?string $reason = null,
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
            utilization: Coerce::toFloatOrNull($data['utilization'] ?? null),
            obligationAmount: Coerce::toFloatOrNull($data['obligationAmount'] ?? null),
            deliveredAmount: Coerce::toFloat($data['deliveredAmount'] ?? null),
            activeDays: Coerce::toInt($data['activeDays'] ?? null),
            measuredDays: Coerce::toInt($data['measuredDays'] ?? null),
            missingDays: Coerce::toInt($data['missingDays'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
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
            'utilization' => $this->utilization,
            'obligationAmount' => $this->obligationAmount,
            'deliveredAmount' => $this->deliveredAmount,
            'activeDays' => $this->activeDays,
            'measuredDays' => $this->measuredDays,
            'missingDays' => $this->missingDays,
            'windowDays' => $this->windowDays,
        ];
        if ($this->reason !== null) {
            $payload['reason'] = $this->reason;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
