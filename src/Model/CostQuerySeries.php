<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class CostQuerySeries implements \JsonSerializable
{
    /** @param list<CostSeriesPoint> $points */
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly string $currency,
        public readonly array $points,
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
            label: Coerce::toString($data['label'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): CostSeriesPoint => CostSeriesPoint::fromArray(Coerce::toArray($item))),
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
            'label' => $this->label,
            'currency' => $this->currency,
            'points' => array_map(static fn (CostSeriesPoint $item): array => $item->toArray(), $this->points),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
