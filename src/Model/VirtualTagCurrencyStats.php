<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

final class VirtualTagCurrencyStats implements \JsonSerializable
{
    /**
     * @param float $unmatched Spend no rule matched.
     * @param list<float> $byRule Spend each rule claimed, in rule order.
     * @param list<array{value: string, amount: float}> $topValues
     */
    public function __construct(
        public readonly string $currency,
        public readonly float $total,
        public readonly float $unmatched,
        public readonly array $byRule,
        public readonly array $topValues,
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
            total: Coerce::toFloat($data['total'] ?? null),
            unmatched: Coerce::toFloat($data['unmatched'] ?? null),
            byRule: Coerce::mapList($data['byRule'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            topValues: Coerce::mapList($data['topValues'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'total' => $this->total,
            'unmatched' => $this->unmatched,
            'byRule' => $this->byRule,
            'topValues' => $this->topValues,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
