<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class ChangeCostImpact implements \JsonSerializable
{
    /**
     * @param ChangeCostImpactStatus::* $status
     * @param ChangeCostBasis::* $costBasis
     * @param int $windowDays The half-window that was requested.
     * @param int $effectiveWindowDays The half-window the data supported. Clamped symmetrically, so both means always average the same number of days.
     * @param string $eventDay UTC day the change landed on. Excluded from both windows — it is a mixed day.
     * @param list<ChangeCostImpactSeries> $series
     * @param ChangeCostImpactConfidence::* $confidence
     * @param list<ChangeCostImpactReason::*> $reasons
     * @param int $overlappingChanges Other recorded changes to the same resource inside the window. A delta is correlation, never causation; this is the number that says how much else was going on.
     */
    public function __construct(
        public readonly string $status,
        public readonly string $costBasis,
        public readonly int $windowDays,
        public readonly int $effectiveWindowDays,
        public readonly string $eventDay,
        public readonly ?ChangeCostImpactWindow $before,
        public readonly ?ChangeCostImpactWindow $after,
        public readonly array $series,
        public readonly string $confidence,
        public readonly array $reasons,
        public readonly int $overlappingChanges,
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
            status: Coerce::toString($data['status'] ?? null),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            effectiveWindowDays: Coerce::toInt($data['effectiveWindowDays'] ?? null),
            eventDay: Coerce::toString($data['eventDay'] ?? null),
            before: Coerce::nullable($data['before'] ?? null, static fn (mixed $value): ChangeCostImpactWindow => ChangeCostImpactWindow::fromArray(Coerce::toArray($value))),
            after: Coerce::nullable($data['after'] ?? null, static fn (mixed $value): ChangeCostImpactWindow => ChangeCostImpactWindow::fromArray(Coerce::toArray($value))),
            series: Coerce::mapList($data['series'] ?? null, static fn (mixed $item): ChangeCostImpactSeries => ChangeCostImpactSeries::fromArray(Coerce::toArray($item))),
            confidence: Coerce::toString($data['confidence'] ?? null),
            reasons: Coerce::mapList($data['reasons'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            overlappingChanges: Coerce::toInt($data['overlappingChanges'] ?? null),
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
            'status' => $this->status,
            'costBasis' => $this->costBasis,
            'windowDays' => $this->windowDays,
            'effectiveWindowDays' => $this->effectiveWindowDays,
            'eventDay' => $this->eventDay,
            'before' => $this->before?->toArray(),
            'after' => $this->after?->toArray(),
            'series' => array_map(static fn (ChangeCostImpactSeries $item): array => $item->toArray(), $this->series),
            'confidence' => $this->confidence,
            'reasons' => $this->reasons,
            'overlappingChanges' => $this->overlappingChanges,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
