<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PriceCatalogCompareResponse implements \JsonSerializable
{
    /**
     * @param PriceCatalogArea::* $area
     * @param PriceRateType::* $rateType
     * @param list<PriceCatalogCompareProvider> $providers
     */
    public function __construct(
        public readonly PriceCatalogCompareTarget $target,
        public readonly ?PriceCatalogRow $reference,
        public readonly string $area,
        public readonly string $rateType,
        public readonly array $providers,
        public readonly ?string $displayCurrency,
        public readonly bool $mixedCurrencies,
        public readonly string $generatedAt,
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
            target: PriceCatalogCompareTarget::fromArray(Coerce::toArray($data['target'] ?? null)),
            reference: Coerce::nullable($data['reference'] ?? null, static fn (mixed $value): PriceCatalogRow => PriceCatalogRow::fromArray(Coerce::toArray($value))),
            area: Coerce::toString($data['area'] ?? null),
            rateType: Coerce::toString($data['rateType'] ?? null),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): PriceCatalogCompareProvider => PriceCatalogCompareProvider::fromArray(Coerce::toArray($item))),
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
            mixedCurrencies: Coerce::toBool($data['mixedCurrencies'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'target' => $this->target->toArray(),
            'reference' => $this->reference?->toArray(),
            'area' => $this->area,
            'rateType' => $this->rateType,
            'providers' => array_map(static fn (PriceCatalogCompareProvider $item): array => $item->toArray(), $this->providers),
            'displayCurrency' => $this->displayCurrency,
            'mixedCurrencies' => $this->mixedCurrencies,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
