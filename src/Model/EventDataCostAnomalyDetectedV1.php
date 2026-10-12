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
 * `data` of a `cost.anomaly.detected` event, version 1. A provider or service spent well outside
 * its baseline, or a new source of spend appeared.
 *
 * Spec schema: `EventData_cost_anomaly_detected_v1`.
 */
final class EventDataCostAnomalyDetectedV1 implements \JsonSerializable
{
    /**
     * @param string $anomalyId Cost anomaly id.
     * @param string $day The day (YYYY-MM-DD, UTC) the spend landed on.
     * @param 'spike'|'new_source' $kind Spike against a baseline, or a source with no prior spend.
     * @param 'provider'|'service' $dimension What `dimensionKey` names.
     * @param string $dimensionKey The provider id or service name.
     * @param float $actual Spend on `day`, in `currency`.
     * @param float $baseline Mean daily spend over the baseline window, in `currency`.
     * @param string $currency ISO 4217 currency code.
     * @param list<string> $hints What the change timeline and audit log say happened around then.
     */
    public function __construct(
        public readonly string $anomalyId,
        public readonly string $day,
        public readonly string $kind,
        public readonly string $dimension,
        public readonly string $dimensionKey,
        public readonly float $actual,
        public readonly float $baseline,
        public readonly string $currency,
        public readonly array $hints,
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
            anomalyId: Coerce::toString($data['anomalyId'] ?? null),
            day: Coerce::toString($data['day'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            dimension: Coerce::toString($data['dimension'] ?? null),
            dimensionKey: Coerce::toString($data['dimensionKey'] ?? null),
            actual: Coerce::toFloat($data['actual'] ?? null),
            baseline: Coerce::toFloat($data['baseline'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            hints: Coerce::mapList($data['hints'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'anomalyId' => $this->anomalyId,
            'day' => $this->day,
            'kind' => $this->kind,
            'dimension' => $this->dimension,
            'dimensionKey' => $this->dimensionKey,
            'actual' => $this->actual,
            'baseline' => $this->baseline,
            'currency' => $this->currency,
            'hints' => $this->hints,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
