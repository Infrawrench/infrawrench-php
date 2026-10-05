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

/** One rule or setting that moved money, in pipeline order. */
final class PricingEffect implements \JsonSerializable
{
    /**
     * @param string $key A billing rule id, or one of `rerate:list`, `rerate:fallback`, `treatment:discounts`, `treatment:credits`, `treatment:commitment_benefits`.
     * @param array<string, float> $totals Currency → what it added or removed.
     */
    public function __construct(
        public readonly string $key,
        public readonly ?string $ruleId,
        public readonly string $label,
        public readonly string $kind,
        public readonly array $totals,
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
            key: Coerce::toString($data['key'] ?? null),
            ruleId: Coerce::toStringOrNull($data['ruleId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            totals: Coerce::mapValues($data['totals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
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
            'key' => $this->key,
            'ruleId' => $this->ruleId,
            'label' => $this->label,
            'kind' => $this->kind,
            'totals' => $this->totals,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
