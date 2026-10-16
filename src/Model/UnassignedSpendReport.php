<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

/**
 * Spend in the period no customer is billed for. Resolved exactly the way an invoice resolves it:
 * allocation rules claim spend for cost centres first, and each account claims only what no rule
 * did. A cost centre is assigned when it or any ancestor is on a customer. Raw spend on the
 * amortized basis, before billing rules.
 */
final class UnassignedSpendReport implements \JsonSerializable
{
    /**
     * @param list<array{kind: 'cost_centre'|'account'|'unallocated', id: string|null, name: string, pluginId: string|null, amounts: array<string, float>}> $rows
     * @param array{unassigned: array<string, float>, assigned: array<string, float>, all: array<string, float>} $totals
     */
    public function __construct(
        public readonly string $periodFrom,
        public readonly string $periodTo,
        public readonly array $rows,
        public readonly array $totals,
        public readonly int $assignable,
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
            periodFrom: Coerce::toString($data['periodFrom'] ?? null),
            periodTo: Coerce::toString($data['periodTo'] ?? null),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            totals: Coerce::toArray($data['totals'] ?? null),
            assignable: Coerce::toInt($data['assignable'] ?? null),
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
            'periodFrom' => $this->periodFrom,
            'periodTo' => $this->periodTo,
            'rows' => $this->rows,
            'totals' => $this->totals,
            'assignable' => $this->assignable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
