<?php

/*
 * infrawrench/sdk v1.57.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.57.0).
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

final class PricingPreviewResult implements \JsonSerializable
{
    /**
     * @param array<string, float> $collected
     * @param array<string, float> $before Priced without the candidate: the saved rules minus `ruleId`, with the saved settings.
     * @param array<string, float> $after Priced with the candidate swapped in.
     * @param list<PricingEffect> $effects
     * @param list<string> $warnings
     * @param list<PricingExpressionFailure> $expressionFailures
     * @param list<array{pluginId: string, service: string, accountName: string, chargeType: string, currency: string, collected: float, before: float, after: float}> $changes The lines that moved most, largest change first, at most 25.
     */
    public function __construct(
        public readonly string $month,
        public readonly string $from,
        public readonly string $to,
        public readonly ?string $managedAccountId,
        public readonly array $collected,
        public readonly array $before,
        public readonly array $after,
        public readonly array $effects,
        public readonly ?RerateCoverage $coverage,
        public readonly array $warnings,
        public readonly array $expressionFailures,
        public readonly array $changes,
        public readonly int $lineCount,
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
            month: Coerce::toString($data['month'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            managedAccountId: Coerce::toStringOrNull($data['managedAccountId'] ?? null),
            collected: Coerce::mapValues($data['collected'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            before: Coerce::mapValues($data['before'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            after: Coerce::mapValues($data['after'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            effects: Coerce::mapList($data['effects'] ?? null, static fn (mixed $item): PricingEffect => PricingEffect::fromArray(Coerce::toArray($item))),
            coverage: Coerce::nullable($data['coverage'] ?? null, static fn (mixed $value): RerateCoverage => RerateCoverage::fromArray(Coerce::toArray($value))),
            warnings: Coerce::mapList($data['warnings'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            expressionFailures: Coerce::mapList($data['expressionFailures'] ?? null, static fn (mixed $item): PricingExpressionFailure => PricingExpressionFailure::fromArray(Coerce::toArray($item))),
            changes: Coerce::mapList($data['changes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            lineCount: Coerce::toInt($data['lineCount'] ?? null),
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
            'month' => $this->month,
            'from' => $this->from,
            'to' => $this->to,
            'managedAccountId' => $this->managedAccountId,
            'collected' => $this->collected,
            'before' => $this->before,
            'after' => $this->after,
            'effects' => array_map(static fn (PricingEffect $item): array => $item->toArray(), $this->effects),
            'coverage' => $this->coverage?->toArray(),
            'warnings' => $this->warnings,
            'expressionFailures' => array_map(static fn (PricingExpressionFailure $item): array => $item->toArray(), $this->expressionFailures),
            'changes' => $this->changes,
            'lineCount' => $this->lineCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
