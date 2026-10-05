<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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

final class CarbonAssumptions implements \JsonSerializable
{
    /**
     * @param float $cpuUtilization Assumed average CPU utilisation, 0 to 1. **The largest single source of error**, stated here rather than buried in a constant: the product does not collect per-resource CPU history for every provider, and a figure derived from the few that do would be quietly inconsistent across an estate.
     * @param array<string, float> $pue Fleet Power Usage Effectiveness, per contributing grid.
     * @param array<string, array{min: float, max: float}> $vcpuWatts
     * @param string $scope What the estimate covers, in one sentence a reader can check.
     */
    public function __construct(
        public readonly float $cpuUtilization,
        public readonly array $pue,
        public readonly array $vcpuWatts,
        public readonly string $coefficientSource,
        public readonly string $coefficientVintage,
        public readonly string $scope,
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
            cpuUtilization: Coerce::toFloat($data['cpuUtilization'] ?? null),
            pue: Coerce::mapValues($data['pue'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            vcpuWatts: Coerce::mapValues($data['vcpuWatts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            coefficientSource: Coerce::toString($data['coefficientSource'] ?? null),
            coefficientVintage: Coerce::toString($data['coefficientVintage'] ?? null),
            scope: Coerce::toString($data['scope'] ?? null),
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
            'cpuUtilization' => $this->cpuUtilization,
            'pue' => $this->pue,
            'vcpuWatts' => $this->vcpuWatts,
            'coefficientSource' => $this->coefficientSource,
            'coefficientVintage' => $this->coefficientVintage,
            'scope' => $this->scope,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
