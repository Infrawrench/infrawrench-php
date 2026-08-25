<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class SleepSchedulePreview implements \JsonSerializable
{
    /**
     * @param float $offFraction Fraction of the week (0–1) the schedule keeps the resource stopped.
     * @param float|null $monthlyCost Trailing spend normalized to a month; null when billing holds no rows.
     * @param int $costWindowDays Days of billing data the estimate was computed over (0 = none found).
     * @param list<ScheduleTransition> $nextTransitions The next few transitions, soonest first — a timezone sanity check.
     */
    public function __construct(
        public readonly float $offFraction,
        public readonly ?float $monthlyCost,
        public readonly ?float $projectedMonthlySaving,
        public readonly ?string $currency,
        public readonly int $costWindowDays,
        public readonly array $nextTransitions,
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
            offFraction: Coerce::toFloat($data['offFraction'] ?? null),
            monthlyCost: Coerce::toFloatOrNull($data['monthlyCost'] ?? null),
            projectedMonthlySaving: Coerce::toFloatOrNull($data['projectedMonthlySaving'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            costWindowDays: Coerce::toInt($data['costWindowDays'] ?? null),
            nextTransitions: Coerce::mapList($data['nextTransitions'] ?? null, static fn (mixed $item): ScheduleTransition => ScheduleTransition::fromArray(Coerce::toArray($item))),
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
            'offFraction' => $this->offFraction,
            'monthlyCost' => $this->monthlyCost,
            'projectedMonthlySaving' => $this->projectedMonthlySaving,
            'currency' => $this->currency,
            'costWindowDays' => $this->costWindowDays,
            'nextTransitions' => array_map(static fn (ScheduleTransition $item): array => $item->toArray(), $this->nextTransitions),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
