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

/**
 * Joins a label to a cost dimension so unit cost and margin can be computed per label value (cost
 * per customer). Ratio modes refuse an unmapped label: without a per-value numerator the only
 * spend available is the whole scope's.
 */
final class BusinessMetricLabelMapping implements \JsonSerializable
{
    /**
     * @param string $label A label key: a lowercase slug, normalised (trimmed, lowercased) on write.
     * @param array{kind: 'dimension', dimension: string, tagKey?: string}|array{kind: 'cost_centre'} $target
     */
    public function __construct(
        public readonly string $label,
        public readonly array $target,
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
            label: Coerce::toString($data['label'] ?? null),
            target: $data['target'] ?? null,
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
            'label' => $this->label,
            'target' => $this->target,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
