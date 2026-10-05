<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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

final class CostAnomalyPrecisionReport implements \JsonSerializable
{
    /**
     * @param list<array{month: string, detected: int, suppressed: int, expected: int, unexpected: int, precision: float|null}> $periods
     * @param array{detected: int, suppressed: int, expected: int, unexpected: int, precision: float|null} $totals
     * @param list<array{reason: mixed, count: int}> $reasons
     */
    public function __construct(
        public readonly int $months,
        public readonly array $periods,
        public readonly array $totals,
        public readonly array $reasons,
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
            months: Coerce::toInt($data['months'] ?? null),
            periods: Coerce::mapList($data['periods'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            totals: Coerce::toArray($data['totals'] ?? null),
            reasons: Coerce::mapList($data['reasons'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'months' => $this->months,
            'periods' => $this->periods,
            'totals' => $this->totals,
            'reasons' => $this->reasons,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
