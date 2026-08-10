<?php

/*
 * infrawrench/sdk v1.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.4.0).
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
     * @param 'spike'|'new_source' $kind Which detection produced the row. `spike` is spend far above the key's own trailing baseline; `new_source` is a provider or service with no spend at all across the trailing window that suddenly has material spend — it can never be a `spike`, since a zero baseline has no mean or deviation to exceed. Rows written before new-source detection existed read as `spike`.
     * @param 'provider'|'service' $dimension
     * @param string $dimensionKey The dimension's value — a plugin id or a service name.
     * @param int $baselineCents Mean daily spend over the trailing 28-day baseline, in cents. Zero, or near it, for a `new_source` — clients must not compute a percentage change from it.
     * @param int $thresholdCents The detection bar the day cleared, in cents: baseline mean + N·stddev for a `spike`, the new-source floor for a `new_source`.
     * @param string|null $notifiedAt When the anomaly was delivered to a notification channel; null when delivery failed or a recent anomaly for the same key suppressed it.
     * @param list<string> $hints Root-cause hints computed when the anomaly fired: human-readable facts from the change timeline and audit log for the anomalous day and the day before (e.g. "12 gce-instance resources appeared", a workflow run, a lifted change freeze), ranked by likely relevance and capped at three. Empty when nothing notable happened in the window or the anomaly predates hint collection.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $day,
        public readonly string $kind,
        public readonly string $dimension,
        public readonly string $dimensionKey,
        public readonly string $currency,
        public readonly int $actualCents,
        public readonly int $baselineCents,
        public readonly int $thresholdCents,
        public readonly string $detectedAt,
        public readonly ?string $notifiedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            day: Coerce::toString($data['day'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            dimension: Coerce::toString($data['dimension'] ?? null),
            dimensionKey: Coerce::toString($data['dimensionKey'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            actualCents: Coerce::toInt($data['actualCents'] ?? null),
            baselineCents: Coerce::toInt($data['baselineCents'] ?? null),
            thresholdCents: Coerce::toInt($data['thresholdCents'] ?? null),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
            notifiedAt: Coerce::toStringOrNull($data['notifiedAt'] ?? null),
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
            'id' => $this->id,
            'day' => $this->day,
            'kind' => $this->kind,
            'dimension' => $this->dimension,
            'dimensionKey' => $this->dimensionKey,
            'currency' => $this->currency,
            'actualCents' => $this->actualCents,
            'baselineCents' => $this->baselineCents,
            'thresholdCents' => $this->thresholdCents,
            'detectedAt' => $this->detectedAt,
            'notifiedAt' => $this->notifiedAt,
            'hints' => $this->hints,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
