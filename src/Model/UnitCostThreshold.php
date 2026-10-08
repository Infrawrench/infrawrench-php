<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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
 * A standing limit, evaluated daily on the summed ratio over the trailing window and routed under
 * the unit-cost alert trigger. A window with fewer than half its days reported is not judged.
 */
final class UnitCostThreshold implements \JsonSerializable
{
    /**
     * @param 'unit_cost'|'margin' $mode
     * @param 'above'|'below' $direction
     * @param float $value Currency units per `scale` metric units for `unit_cost`; a percentage (30 for 30%) for `margin`.
     * @param string|null $groupByLabel Evaluate per value of this label. The label must be mapped.
     * @param int|null $windowDays Trailing complete days the ratio is summed over. Default 7.
     */
    public function __construct(
        public readonly string $mode,
        public readonly string $direction,
        public readonly float $value,
        public readonly ?float $scale = null,
        public readonly ?string $groupByLabel = null,
        public readonly ?int $windowDays = null,
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
            mode: Coerce::toString($data['mode'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            value: Coerce::toFloat($data['value'] ?? null),
            scale: Coerce::toFloatOrNull($data['scale'] ?? null),
            groupByLabel: Coerce::toStringOrNull($data['groupByLabel'] ?? null),
            windowDays: Coerce::toIntOrNull($data['windowDays'] ?? null),
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
            'mode' => $this->mode,
            'direction' => $this->direction,
            'value' => $this->value,
        ];
        if ($this->scale !== null) {
            $payload['scale'] = $this->scale;
        }
        if ($this->groupByLabel !== null) {
            $payload['groupByLabel'] = $this->groupByLabel;
        }
        if ($this->windowDays !== null) {
            $payload['windowDays'] = $this->windowDays;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
