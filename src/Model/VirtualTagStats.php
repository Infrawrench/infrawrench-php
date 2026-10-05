<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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
final class VirtualTagStats implements \JsonSerializable
{
    /**
     * @param list<VirtualTagCurrencyStats> $currencies
     * @param int $metricFallbackDays Days a metric split carried weights forward or split evenly.
     */
    public function __construct(
        public readonly ?string $from,
        public readonly ?string $to,
        public readonly array $currencies,
        public readonly int $metricFallbackDays,
        public readonly int $distinctValues,
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
            from: Coerce::toStringOrNull($data['from'] ?? null),
            to: Coerce::toStringOrNull($data['to'] ?? null),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): VirtualTagCurrencyStats => VirtualTagCurrencyStats::fromArray(Coerce::toArray($item))),
            metricFallbackDays: Coerce::toInt($data['metricFallbackDays'] ?? null),
            distinctValues: Coerce::toInt($data['distinctValues'] ?? null),
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
            'currencies' => array_map(static fn (VirtualTagCurrencyStats $item): array => $item->toArray(), $this->currencies),
            'metricFallbackDays' => $this->metricFallbackDays,
            'distinctValues' => $this->distinctValues,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
