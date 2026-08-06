<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class UntaggedSpendReport implements \JsonSerializable
{
    /**
     * @param list<string> $requiredKeys
     * @param list<string> $currencies
     * @param array<string, float> $totals Currency code → amount in the currency's major unit.
     * @param array<string, float> $untaggedTotals Spend on rows missing at least one required tag key, per currency.
     * @param list<array{key: string, untagged: array<string, float>}> $byKey
     * @param list<array{accountId: string, accountLabel: string, service: string, currency: string, amount: float}> $topUntagged
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly array $requiredKeys,
        public readonly array $currencies,
        public readonly array $totals,
        public readonly array $untaggedTotals,
        public readonly array $byKey,
        public readonly array $topUntagged,
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
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            requiredKeys: Coerce::mapList($data['requiredKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            totals: Coerce::mapValues($data['totals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            untaggedTotals: Coerce::mapValues($data['untaggedTotals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            byKey: Coerce::mapList($data['byKey'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            topUntagged: Coerce::mapList($data['topUntagged'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'from' => $this->from,
            'to' => $this->to,
            'requiredKeys' => $this->requiredKeys,
            'currencies' => $this->currencies,
            'totals' => $this->totals,
            'untaggedTotals' => $this->untaggedTotals,
            'byKey' => $this->byKey,
            'topUntagged' => $this->topUntagged,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
