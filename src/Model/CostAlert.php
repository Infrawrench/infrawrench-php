<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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
 * A change-based cost alert: fires when spend on its scope moves more than the configured
 * threshold versus the prior period. The third alert family alongside budgets (absolute monthly
 * total) and anomaly detection (statistical outliers against a learned baseline).
 */
final class CostAlert implements \JsonSerializable
{
    /**
     * @param list<CostAlertFilter> $filters
     * @param 'provider'|'account'|'service'|'region'|'resource'|'tag'|'charge_type'|'commitment'|null $groupBy Per-group fan-out. Null watches the scope's one total; a dimension watches each group against its own prior window, and each offending group fires its own event.
     * @param CostChangeCadence::* $cadence
     * @param CostChangeDirection::* $direction
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $filters,
        public readonly ?string $groupBy,
        public readonly ?string $groupByTagKey,
        public readonly string $cadence,
        public readonly ?int $thresholdPercent,
        public readonly ?int $thresholdAmountCents,
        public readonly string $direction,
        public readonly bool $enabled,
        public readonly ?string $lastEvaluatedAt,
        public readonly ?string $lastFiredAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            name: Coerce::toString($data['name'] ?? null),
            filters: Coerce::mapList($data['filters'] ?? null, static fn (mixed $item): CostAlertFilter => CostAlertFilter::fromArray(Coerce::toArray($item))),
            groupBy: Coerce::toStringOrNull($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            cadence: Coerce::toString($data['cadence'] ?? null),
            thresholdPercent: Coerce::toIntOrNull($data['thresholdPercent'] ?? null),
            thresholdAmountCents: Coerce::toIntOrNull($data['thresholdAmountCents'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lastEvaluatedAt: Coerce::toStringOrNull($data['lastEvaluatedAt'] ?? null),
            lastFiredAt: Coerce::toStringOrNull($data['lastFiredAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'name' => $this->name,
            'filters' => array_map(static fn (CostAlertFilter $item): array => $item->toArray(), $this->filters),
            'groupBy' => $this->groupBy,
            'groupByTagKey' => $this->groupByTagKey,
            'cadence' => $this->cadence,
            'thresholdPercent' => $this->thresholdPercent,
            'thresholdAmountCents' => $this->thresholdAmountCents,
            'direction' => $this->direction,
            'enabled' => $this->enabled,
            'lastEvaluatedAt' => $this->lastEvaluatedAt,
            'lastFiredAt' => $this->lastFiredAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
