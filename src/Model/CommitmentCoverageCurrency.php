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

final class CommitmentCoverageCurrency implements \JsonSerializable
{
    /**
     * @param float $coveredAmount Usage spend on rows stamped with a commitment id.
     * @param float $uncoveredEligibleAmount Uncovered usage in cells where a commitment landed in the window — provider evidence of committability, not a hand-maintained service table.
     * @param float|null $broadRatio Lower bound: covered ÷ (covered + all uncovered usage).
     * @param float|null $narrowRatio Upper bound: covered ÷ (covered + uncovered usage in eligible cells).
     */
    public function __construct(
        public readonly string $currency,
        public readonly float $coveredAmount,
        public readonly float $uncoveredAmount,
        public readonly float $uncoveredEligibleAmount,
        public readonly ?float $broadRatio,
        public readonly ?float $narrowRatio,
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
            currency: Coerce::toString($data['currency'] ?? null),
            coveredAmount: Coerce::toFloat($data['coveredAmount'] ?? null),
            uncoveredAmount: Coerce::toFloat($data['uncoveredAmount'] ?? null),
            uncoveredEligibleAmount: Coerce::toFloat($data['uncoveredEligibleAmount'] ?? null),
            broadRatio: Coerce::toFloatOrNull($data['broadRatio'] ?? null),
            narrowRatio: Coerce::toFloatOrNull($data['narrowRatio'] ?? null),
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
            'currency' => $this->currency,
            'coveredAmount' => $this->coveredAmount,
            'uncoveredAmount' => $this->uncoveredAmount,
            'uncoveredEligibleAmount' => $this->uncoveredEligibleAmount,
            'broadRatio' => $this->broadRatio,
            'narrowRatio' => $this->narrowRatio,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
