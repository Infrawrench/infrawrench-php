<?php

/*
 * infrawrench/sdk v1.54.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.54.0).
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

final class PriceCatalogRow implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param PriceCatalogProductFamily::* $family
     * @param float|null $monthlyAmount `price` as a 730-hour month.
     * @param list<PriceCatalogPrice> $otherPrices The product's other rates in the same region.
     * @param array{resourceTypeId: string, fields: array<string, string>}|null $estimate Create-form prefill for the plugin's estimate, with the region filled in.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $serviceId,
        public readonly string $serviceLabel,
        public readonly string $sku,
        public readonly string $name,
        public readonly string $family,
        public readonly ?string $series,
        public readonly PriceCatalogSpecs $specs,
        public readonly string $region,
        public readonly string $regionLabel,
        public readonly PriceCatalogPrice $price,
        public readonly ?float $monthlyAmount,
        public readonly ?PriceCatalogComparable $comparable,
        public readonly array $otherPrices,
        public readonly ?array $estimate,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            serviceId: Coerce::toString($data['serviceId'] ?? null),
            serviceLabel: Coerce::toString($data['serviceLabel'] ?? null),
            sku: Coerce::toString($data['sku'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            family: Coerce::toString($data['family'] ?? null),
            series: Coerce::toStringOrNull($data['series'] ?? null),
            specs: PriceCatalogSpecs::fromArray(Coerce::toArray($data['specs'] ?? null)),
            region: Coerce::toString($data['region'] ?? null),
            regionLabel: Coerce::toString($data['regionLabel'] ?? null),
            price: PriceCatalogPrice::fromArray(Coerce::toArray($data['price'] ?? null)),
            monthlyAmount: Coerce::toFloatOrNull($data['monthlyAmount'] ?? null),
            comparable: Coerce::nullable($data['comparable'] ?? null, static fn (mixed $value): PriceCatalogComparable => PriceCatalogComparable::fromArray(Coerce::toArray($value))),
            otherPrices: Coerce::mapList($data['otherPrices'] ?? null, static fn (mixed $item): PriceCatalogPrice => PriceCatalogPrice::fromArray(Coerce::toArray($item))),
            estimate: Coerce::toArrayOrNull($data['estimate'] ?? null),
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
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'serviceId' => $this->serviceId,
            'serviceLabel' => $this->serviceLabel,
            'sku' => $this->sku,
            'name' => $this->name,
            'family' => $this->family,
            'series' => $this->series,
            'specs' => $this->specs->toArray(),
            'region' => $this->region,
            'regionLabel' => $this->regionLabel,
            'price' => $this->price->toArray(),
            'monthlyAmount' => $this->monthlyAmount,
            'comparable' => $this->comparable?->toArray(),
            'otherPrices' => array_map(static fn (PriceCatalogPrice $item): array => $item->toArray(), $this->otherPrices),
            'estimate' => $this->estimate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
