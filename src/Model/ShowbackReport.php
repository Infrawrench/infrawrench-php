<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class ShowbackReport implements \JsonSerializable
{
    /**
     * @param list<string> $currencies
     * @param list<array{costCentreId: string|null, name: string, totals: array<string, float>, subtreeTotals: array<string, float>, parentId: string|null, depth: int}> $centres Depth-first: each centre immediately followed by its children, siblings name-sorted, with the "Unallocated" bucket last.
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly array $currencies,
        public readonly array $centres,
        public readonly ?CostAdjustmentSummary $adjustment = null,
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
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            centres: Coerce::mapList($data['centres'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            adjustment: Coerce::nullable($data['adjustment'] ?? null, static fn (mixed $value): CostAdjustmentSummary => CostAdjustmentSummary::fromArray(Coerce::toArray($value))),
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
            'from' => $this->from,
            'to' => $this->to,
            'currencies' => $this->currencies,
            'centres' => $this->centres,
        ];
        if ($this->adjustment !== null) {
            $payload['adjustment'] = $this->adjustment->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
