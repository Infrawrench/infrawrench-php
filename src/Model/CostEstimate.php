<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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

/** The API may send `null` in place of this object. */
final class CostEstimate implements \JsonSerializable
{
    /**
     * @param list<CostEstimateLineItem> $lineItems
     * @param list<string>|null $notes
     */
    public function __construct(
        public readonly float $monthlyAmount,
        public readonly string $currency,
        public readonly array $lineItems,
        public readonly ?bool $partial = null,
        public readonly ?array $notes = null,
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
            monthlyAmount: Coerce::toFloat($data['monthlyAmount'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            lineItems: Coerce::mapList($data['lineItems'] ?? null, static fn (mixed $item): CostEstimateLineItem => CostEstimateLineItem::fromArray(Coerce::toArray($item))),
            partial: Coerce::toBoolOrNull($data['partial'] ?? null),
            notes: Coerce::nullable($data['notes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'monthlyAmount' => $this->monthlyAmount,
            'currency' => $this->currency,
            'lineItems' => array_map(static fn (CostEstimateLineItem $item): array => $item->toArray(), $this->lineItems),
        ];
        if ($this->partial !== null) {
            $payload['partial'] = $this->partial;
        }
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
