<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class BudgetHierarchyWarning implements \JsonSerializable
{
    /**
     * @param 'allocation'|'actual'|'forecast' $kind `allocation`: the children's own amounts for this period (children on the same period only) add up to more than the parent's. `actual`: together they have already spent more. `forecast`: together they are projected to.
     * @param float $childTotal The children's total, in the parent's unit.
     * @param float $parentLimit The parent's limit for the period, in the same unit.
     */
    public function __construct(
        public readonly string $kind,
        public readonly float $childTotal,
        public readonly float $parentLimit,
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
            kind: Coerce::toString($data['kind'] ?? null),
            childTotal: Coerce::toFloat($data['childTotal'] ?? null),
            parentLimit: Coerce::toFloat($data['parentLimit'] ?? null),
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
            'kind' => $this->kind,
            'childTotal' => $this->childTotal,
            'parentLimit' => $this->parentLimit,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
