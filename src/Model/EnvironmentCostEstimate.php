<?php

/*
 * infrawrench/sdk v1.49.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.49.0).
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

final class EnvironmentCostEstimate implements \JsonSerializable
{
    /**
     * @param float|null $monthlyAmount Null means 'could not be priced', which is not the same as zero.
     * @param bool $partial True when at least one member is unpriced — read as 'at least'.
     * @param float|null $monthlyKgCo2e Estimated monthly kg CO2e of the members that could be placed against a published grid figure. Null when none could. See the Carbon tag for the method.
     * @param int $uncarbonedCount Sized compute members whose carbon could not be estimated.
     * @param list<array{memberKey: string, displayName: string, monthlyAmount: float|null, currency: string|null, monthlyKgCo2e: float|null}> $members
     */
    public function __construct(
        public readonly ?float $monthlyAmount,
        public readonly ?string $currency,
        public readonly bool $partial,
        public readonly int $unpricedCount,
        public readonly ?float $monthlyKgCo2e,
        public readonly int $uncarbonedCount,
        public readonly array $members,
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
            monthlyAmount: Coerce::toFloatOrNull($data['monthlyAmount'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            partial: Coerce::toBool($data['partial'] ?? null),
            unpricedCount: Coerce::toInt($data['unpricedCount'] ?? null),
            monthlyKgCo2e: Coerce::toFloatOrNull($data['monthlyKgCo2e'] ?? null),
            uncarbonedCount: Coerce::toInt($data['uncarbonedCount'] ?? null),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'monthlyAmount' => $this->monthlyAmount,
            'currency' => $this->currency,
            'partial' => $this->partial,
            'unpricedCount' => $this->unpricedCount,
            'monthlyKgCo2e' => $this->monthlyKgCo2e,
            'uncarbonedCount' => $this->uncarbonedCount,
            'members' => $this->members,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
