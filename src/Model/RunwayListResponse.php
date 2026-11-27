<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class RunwayListResponse implements \JsonSerializable
{
    /**
     * @param list<RunwayRow> $rows Every declared usage with a reading, soonest to run out first.
     * @param int $runwayDays The organization's runway alert threshold, in days.
     * @param float $allowanceThreshold The organization's monthly allowance alert threshold, as a fraction.
     * @param int $windowDays How far back the trend looks, in days.
     */
    public function __construct(
        public readonly array $rows,
        public readonly int $runwayDays,
        public readonly float $allowanceThreshold,
        public readonly int $windowDays,
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
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): RunwayRow => RunwayRow::fromArray(Coerce::toArray($item))),
            runwayDays: Coerce::toInt($data['runwayDays'] ?? null),
            allowanceThreshold: Coerce::toFloat($data['allowanceThreshold'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
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
            'rows' => array_map(static fn (RunwayRow $item): array => $item->toArray(), $this->rows),
            'runwayDays' => $this->runwayDays,
            'allowanceThreshold' => $this->allowanceThreshold,
            'windowDays' => $this->windowDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
