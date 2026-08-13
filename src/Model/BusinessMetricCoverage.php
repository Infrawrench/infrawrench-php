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

/**
 * Null when the metric has no values at all — not an error, but every unit-cost chart drawn from
 * it is one continuous gap.
 *
 * The API may send `null` in place of this object.
 */
final class BusinessMetricCoverage implements \JsonSerializable
{
    /**
     * @param string $firstDay Earliest reported day, YYYY-MM-DD.
     * @param int $reportedDays Days carrying a value — compare against the span to spot a sparse series.
     */
    public function __construct(
        public readonly string $firstDay,
        public readonly string $lastDay,
        public readonly int $reportedDays,
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
            firstDay: Coerce::toString($data['firstDay'] ?? null),
            lastDay: Coerce::toString($data['lastDay'] ?? null),
            reportedDays: Coerce::toInt($data['reportedDays'] ?? null),
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
            'firstDay' => $this->firstDay,
            'lastDay' => $this->lastDay,
            'reportedDays' => $this->reportedDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
