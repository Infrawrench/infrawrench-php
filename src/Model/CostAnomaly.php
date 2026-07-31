<?php

/*
 * infrawrench/sdk v0.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.25.0).
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

final class CostAnomaly implements \JsonSerializable
{
    /**
     * @param string $day The anomalous UTC day.
     * @param 'provider'|'service' $dimension
     * @param string $dimensionKey The dimension's value — a plugin id or a service name.
     * @param int $baselineCents Mean daily spend over the trailing 28-day baseline, in cents.
     * @param int $thresholdCents The detection bar the day cleared (baseline mean + N·stddev), in cents.
     * @param string|null $notifiedAt When the anomaly was delivered to a notification channel; null when delivery failed or a recent anomaly for the same key suppressed it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $day,
        public readonly string $dimension,
        public readonly string $dimensionKey,
        public readonly string $currency,
        public readonly int $actualCents,
        public readonly int $baselineCents,
        public readonly int $thresholdCents,
        public readonly string $detectedAt,
        public readonly ?string $notifiedAt,
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
            day: Coerce::toString($data['day'] ?? null),
            dimension: Coerce::toString($data['dimension'] ?? null),
            dimensionKey: Coerce::toString($data['dimensionKey'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            actualCents: Coerce::toInt($data['actualCents'] ?? null),
            baselineCents: Coerce::toInt($data['baselineCents'] ?? null),
            thresholdCents: Coerce::toInt($data['thresholdCents'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
            notifiedAt: Coerce::toStringOrNull($data['notifiedAt'] ?? null),
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
            'day' => $this->day,
            'dimension' => $this->dimension,
            'dimensionKey' => $this->dimensionKey,
            'currency' => $this->currency,
            'actualCents' => $this->actualCents,
            'baselineCents' => $this->baselineCents,
            'thresholdCents' => $this->thresholdCents,
            'detectedAt' => $this->detectedAt,
            'notifiedAt' => $this->notifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
