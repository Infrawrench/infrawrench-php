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

final class BudgetAlertEvent implements \JsonSerializable
{
    /** @param 'actual'|'forecast' $thresholdType */
    public function __construct(
        public readonly string $id,
        public readonly string $month,
        public readonly string $thresholdType,
        public readonly int $thresholdPercent,
        public readonly int $actualAmountCents,
        public readonly ?int $forecastAmountCents,
        public readonly string $triggeredAt,
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
            month: Coerce::toString($data['month'] ?? null),
            thresholdType: Coerce::toString($data['thresholdType'] ?? null),
            thresholdPercent: Coerce::toInt($data['thresholdPercent'] ?? null),
            actualAmountCents: Coerce::toInt($data['actualAmountCents'] ?? null),
            forecastAmountCents: Coerce::toIntOrNull($data['forecastAmountCents'] ?? null),
            triggeredAt: Coerce::toString($data['triggeredAt'] ?? null),
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
            'month' => $this->month,
            'thresholdType' => $this->thresholdType,
            'thresholdPercent' => $this->thresholdPercent,
            'actualAmountCents' => $this->actualAmountCents,
            'forecastAmountCents' => $this->forecastAmountCents,
            'triggeredAt' => $this->triggeredAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
