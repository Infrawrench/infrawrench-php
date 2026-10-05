<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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

final class PriceCatalogSearchResponse implements \JsonSerializable
{
    /**
     * @param list<PriceCatalogRow> $rows
     * @param PriceCatalogArea::* $area
     * @param PriceRateType::* $rateType
     * @param list<PriceCatalogProviderStatus> $providers
     * @param list<string> $currencies
     * @param bool $mixedCurrencies True when rows were sorted across currencies with no common comparable figure.
     * @param list<string> $gpuModels
     */
    public function __construct(
        public readonly array $rows,
        public readonly int $total,
        public readonly int $offset,
        public readonly int $limit,
        public readonly string $area,
        public readonly string $rateType,
        public readonly array $providers,
        public readonly ?string $displayCurrency,
        public readonly array $currencies,
        public readonly bool $mixedCurrencies,
        public readonly array $gpuModels,
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
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): PriceCatalogRow => PriceCatalogRow::fromArray(Coerce::toArray($item))),
            total: Coerce::toInt($data['total'] ?? null),
            offset: Coerce::toInt($data['offset'] ?? null),
            limit: Coerce::toInt($data['limit'] ?? null),
            area: Coerce::toString($data['area'] ?? null),
            rateType: Coerce::toString($data['rateType'] ?? null),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): PriceCatalogProviderStatus => PriceCatalogProviderStatus::fromArray(Coerce::toArray($item))),
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
            currencies: Coerce::mapList($data['currencies'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            mixedCurrencies: Coerce::toBool($data['mixedCurrencies'] ?? null),
            gpuModels: Coerce::mapList($data['gpuModels'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'rows' => array_map(static fn (PriceCatalogRow $item): array => $item->toArray(), $this->rows),
            'total' => $this->total,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'area' => $this->area,
            'rateType' => $this->rateType,
            'providers' => array_map(static fn (PriceCatalogProviderStatus $item): array => $item->toArray(), $this->providers),
            'displayCurrency' => $this->displayCurrency,
            'currencies' => $this->currencies,
            'mixedCurrencies' => $this->mixedCurrencies,
            'gpuModels' => $this->gpuModels,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
