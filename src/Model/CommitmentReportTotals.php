<?php

/*
 * infrawrench/sdk v1.123.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.123.0).
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

final class CommitmentReportTotals implements \JsonSerializable
{
    /**
     * @param float $covered Amortized usage the selected commitments covered: the used commitment cost.
     * @param float $coveredAll Amortized usage any commitment covered.
     * @param float $unused Amortized commitment fees no usage absorbed (only fee rows with a reported amortized amount).
     * @param float $uncovered Amortized usage no commitment covered: the on-demand remainder.
     * @param float $uncoveredEligible Uncovered usage in (provider, service, region) cells with any covered usage in the window.
     * @param float $coveredOnDemand On-demand equivalent of covered usage, summed over rows whose provider reported one.
     * @param float $coveredMeasured Amortized amount of those same rows.
     */
    public function __construct(
        public readonly float $covered,
        public readonly float $coveredAll,
        public readonly float $unused,
        public readonly float $uncovered,
        public readonly float $uncoveredEligible,
        public readonly float $coveredOnDemand,
        public readonly float $coveredMeasured,
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
            covered: Coerce::toFloat($data['covered'] ?? null),
            coveredAll: Coerce::toFloat($data['coveredAll'] ?? null),
            unused: Coerce::toFloat($data['unused'] ?? null),
            uncovered: Coerce::toFloat($data['uncovered'] ?? null),
            uncoveredEligible: Coerce::toFloat($data['uncoveredEligible'] ?? null),
            coveredOnDemand: Coerce::toFloat($data['coveredOnDemand'] ?? null),
            coveredMeasured: Coerce::toFloat($data['coveredMeasured'] ?? null),
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
            'covered' => $this->covered,
            'coveredAll' => $this->coveredAll,
            'unused' => $this->unused,
            'uncovered' => $this->uncovered,
            'uncoveredEligible' => $this->uncoveredEligible,
            'coveredOnDemand' => $this->coveredOnDemand,
            'coveredMeasured' => $this->coveredMeasured,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
