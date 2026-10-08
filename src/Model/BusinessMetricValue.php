<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class BusinessMetricValue implements \JsonSerializable
{
    /**
     * @param string $day UTC day, YYYY-MM-DD.
     * @param string|null $label The single breakdown label: the `label` key of `labels`, or null. Kept for clients that predate multi-dimensional labels.
     * @param array<string, string> $labels
     * @param 'api'|'workflow'|'import' $source
     */
    public function __construct(
        public readonly string $day,
        public readonly float $value,
        public readonly ?string $label,
        public readonly array $labels,
        public readonly string $source,
        public readonly string $updatedAt,
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
            day: Coerce::toString($data['day'] ?? null),
            value: Coerce::toFloat($data['value'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
            labels: Coerce::mapValues($data['labels'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            source: Coerce::toString($data['source'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'day' => $this->day,
            'value' => $this->value,
            'label' => $this->label,
            'labels' => $this->labels,
            'source' => $this->source,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
