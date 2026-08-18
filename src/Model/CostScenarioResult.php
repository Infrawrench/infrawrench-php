<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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

final class CostScenarioResult implements \JsonSerializable
{
    /**
     * @param list<CostSeriesPoint> $points The adjusted projection — exactly the same days as `forecast`, never one more or fewer. A scenario modifies the projected region; it does not extend it, and it can never touch a day that already has recorded spend behind it.
     * @param list<array{adjustmentId: string, label: string, kind: 'one_off'|'recurring'|'rate_change', amount: float}> $contributions Signed total each adjustment added across the horizon, in model order.
     * @param float $totalDelta Signed difference from the baseline across the horizon.
     * @param list<string> $outOfScope Adjustments this chart's own filters exclude, by label — a GCP commitment on an AWS-filtered chart is correctly left out, and saying so is what makes the number trustworthy rather than quietly assumed broken.
     * @param string|null $convertedFrom Set when the model's amounts were converted at the org's stated rates.
     */
    public function __construct(
        public readonly string $modelId,
        public readonly string $modelName,
        public readonly string $currency,
        public readonly array $points,
        public readonly array $contributions,
        public readonly float $totalDelta,
        public readonly array $outOfScope,
        public readonly ?string $convertedFrom = null,
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
            modelId: Coerce::toString($data['modelId'] ?? null),
            modelName: Coerce::toString($data['modelName'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): CostSeriesPoint => CostSeriesPoint::fromArray(Coerce::toArray($item))),
            contributions: Coerce::mapList($data['contributions'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            totalDelta: Coerce::toFloat($data['totalDelta'] ?? null),
            outOfScope: Coerce::mapList($data['outOfScope'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            convertedFrom: Coerce::toStringOrNull($data['convertedFrom'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'modelId' => $this->modelId,
            'modelName' => $this->modelName,
            'currency' => $this->currency,
            'points' => array_map(static fn (CostSeriesPoint $item): array => $item->toArray(), $this->points),
            'contributions' => $this->contributions,
            'totalDelta' => $this->totalDelta,
            'outOfScope' => $this->outOfScope,
        ];
        if ($this->convertedFrom !== null) {
            $payload['convertedFrom'] = $this->convertedFrom;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
