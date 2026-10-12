<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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
 * `data` of a `budget.threshold.crossed` event, version 1. A budget's actual or forecast spend (or
 * usage) reached one of its alert thresholds.
 *
 * Spec schema: `EventData_budget_threshold_crossed_v1`.
 */
final class EventDataBudgetThresholdCrossedV1 implements \JsonSerializable
{
    /**
     * @param string $budgetId Budget id.
     * @param string $budgetName Budget name.
     * @param string $periodKey The budget period the threshold fired in.
     * @param string|null $periodStart First day of the period (YYYY-MM-DD); null for a calendar month.
     * @param string|null $periodEnd Last day of the period (YYYY-MM-DD); null for a calendar month.
     * @param 'actual'|'forecast' $thresholdType Whether actual or forecast crossed.
     * @param float $thresholdPercent The threshold, as a percent of the limit.
     * @param 'spend'|'usage' $measure A spend budget or a usage budget.
     * @param float $observed The observed figure: cents for spend, units for usage.
     * @param float $limit The budget's limit, in the same unit as `observed`.
     * @param string|null $currency ISO 4217 code for a spend budget.
     */
    public function __construct(
        public readonly string $budgetId,
        public readonly string $budgetName,
        public readonly string $periodKey,
        public readonly ?string $periodStart,
        public readonly ?string $periodEnd,
        public readonly string $thresholdType,
        public readonly float $thresholdPercent,
        public readonly string $measure,
        public readonly float $observed,
        public readonly float $limit,
        public readonly ?string $currency,
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
            budgetId: Coerce::toString($data['budgetId'] ?? null),
            budgetName: Coerce::toString($data['budgetName'] ?? null),
            periodKey: Coerce::toString($data['periodKey'] ?? null),
            periodStart: Coerce::toStringOrNull($data['periodStart'] ?? null),
            periodEnd: Coerce::toStringOrNull($data['periodEnd'] ?? null),
            thresholdType: Coerce::toString($data['thresholdType'] ?? null),
            thresholdPercent: Coerce::toFloat($data['thresholdPercent'] ?? null),
            measure: Coerce::toString($data['measure'] ?? null),
            observed: Coerce::toFloat($data['observed'] ?? null),
            limit: Coerce::toFloat($data['limit'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
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
            'budgetId' => $this->budgetId,
            'budgetName' => $this->budgetName,
            'periodKey' => $this->periodKey,
            'periodStart' => $this->periodStart,
            'periodEnd' => $this->periodEnd,
            'thresholdType' => $this->thresholdType,
            'thresholdPercent' => $this->thresholdPercent,
            'measure' => $this->measure,
            'observed' => $this->observed,
            'limit' => $this->limit,
            'currency' => $this->currency,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
