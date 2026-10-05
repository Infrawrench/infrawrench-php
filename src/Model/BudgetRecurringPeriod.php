<?php

/*
 * infrawrench/sdk v1.60.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.60.0).
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

final class BudgetRecurringPeriod implements \JsonSerializable
{
    /**
     * @param 'recurring' $kind
     * @param 'day'|'week'|'month'|'quarter'|'year' $unit
     * @param string $startDate First day of the first period (UTC, inclusive).
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $unit,
        public readonly int $interval,
        public readonly string $startDate,
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
            kind: Coerce::toString($data['kind'] ?? null),
            unit: Coerce::toString($data['unit'] ?? null),
            interval: Coerce::toInt($data['interval'] ?? null),
            startDate: Coerce::toString($data['startDate'] ?? null),
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
            'kind' => $this->kind,
            'unit' => $this->unit,
            'interval' => $this->interval,
            'startDate' => $this->startDate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
