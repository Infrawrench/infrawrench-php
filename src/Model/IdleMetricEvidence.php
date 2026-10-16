<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class IdleMetricEvidence implements \JsonSerializable
{
    /**
     * @param string $metric Provider metric name.
     * @param 'sum'|'max'|'average'|'min'|'count' $statistic
     * @param float|null $value The aggregate over the whole lookback window; null when the provider had no data.
     * @param 'count'|'bytes'|'percent'|'days' $unit
     * @param float|null $threshold The bound this reading was judged against, when it was a deciding reading.
     * @param 'atMost'|'atLeast'|null $comparison `atMost`: the value at or under the threshold is the idle side.
     */
    public function __construct(
        public readonly string $metric,
        public readonly string $label,
        public readonly string $statistic,
        public readonly ?float $value,
        public readonly string $unit,
        public readonly ?float $threshold = null,
        public readonly ?string $comparison = null,
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
            metric: Coerce::toString($data['metric'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            statistic: Coerce::toString($data['statistic'] ?? null),
            value: Coerce::toFloatOrNull($data['value'] ?? null),
            unit: Coerce::toString($data['unit'] ?? null),
            threshold: Coerce::toFloatOrNull($data['threshold'] ?? null),
            comparison: Coerce::toStringOrNull($data['comparison'] ?? null),
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
            'metric' => $this->metric,
            'label' => $this->label,
            'statistic' => $this->statistic,
            'value' => $this->value,
            'unit' => $this->unit,
        ];
        if ($this->threshold !== null) {
            $payload['threshold'] = $this->threshold;
        }
        if ($this->comparison !== null) {
            $payload['comparison'] = $this->comparison;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
