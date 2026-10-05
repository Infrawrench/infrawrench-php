<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

final class PriceCatalogCompareProvider implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param PriceCatalogProviderState::* $state
     * @param list<PriceCatalogRow> $alternatives
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly ?string $region,
        public readonly ?string $regionLabel,
        public readonly string $state,
        public readonly ?string $error,
        public readonly ?PriceCatalogRow $best,
        public readonly array $alternatives,
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
            region: Coerce::toStringOrNull($data['region'] ?? null),
            regionLabel: Coerce::toStringOrNull($data['regionLabel'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            best: Coerce::nullable($data['best'] ?? null, static fn (mixed $value): PriceCatalogRow => PriceCatalogRow::fromArray(Coerce::toArray($value))),
            alternatives: Coerce::mapList($data['alternatives'] ?? null, static fn (mixed $item): PriceCatalogRow => PriceCatalogRow::fromArray(Coerce::toArray($item))),
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
            'region' => $this->region,
            'regionLabel' => $this->regionLabel,
            'state' => $this->state,
            'error' => $this->error,
            'best' => $this->best?->toArray(),
            'alternatives' => array_map(static fn (PriceCatalogRow $item): array => $item->toArray(), $this->alternatives),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
