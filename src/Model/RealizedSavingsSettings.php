<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class RealizedSavingsSettings implements \JsonSerializable
{
    /**
     * @param int $horizonMonths How long a one-off action keeps accruing, in months. Default 12.
     * @param int $shortfallThresholdPercent Below this share of the projected rate an action is flagged short. Default 70.
     * @param int $baselineWindowDays Days before the action whose spend makes up the baseline. Default 14.
     */
    public function __construct(
        public readonly int $horizonMonths,
        public readonly int $shortfallThresholdPercent,
        public readonly int $baselineWindowDays,
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
            horizonMonths: Coerce::toInt($data['horizonMonths'] ?? null),
            shortfallThresholdPercent: Coerce::toInt($data['shortfallThresholdPercent'] ?? null),
            baselineWindowDays: Coerce::toInt($data['baselineWindowDays'] ?? null),
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
            'horizonMonths' => $this->horizonMonths,
            'shortfallThresholdPercent' => $this->shortfallThresholdPercent,
            'baselineWindowDays' => $this->baselineWindowDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
