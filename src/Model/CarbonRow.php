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

final class CarbonRow implements \JsonSerializable
{
    /**
     * @param float $vcpus vCPUs per unit.
     * @param int $count Units the figure covers (node count); 1 for one machine.
     * @param string $grid The coefficient table the region resolved in: `aws`, `gcp`, `azure`, `hetzner`...
     * @param float $gridIntensity Grams CO2e per kWh used for this row: the published figure, not a band.
     * @param string $gridZone What the grid figure describes, e.g. `Germany`.
     * @param 'ccf'|'ember-2024' $gridBasis `ccf`: Cloud Carbon Footprint's per-region table. `ember-2024`: Ember's 2024 lifecycle figure for the country.
     * @param float $pue Datacentre overhead used: regional where published, else fleet.
     */
    public function __construct(
        public readonly float $vcpus,
        public readonly int $count,
        public readonly string $region,
        public readonly string $grid,
        public readonly float $gridIntensity,
        public readonly string $gridZone,
        public readonly string $gridBasis,
        public readonly float $pue,
        public readonly float $kwh,
        public readonly float $kgCo2e,
        public readonly string $resourceId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly ?string $accountName,
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
            vcpus: Coerce::toFloat($data['vcpus'] ?? null),
            count: Coerce::toInt($data['count'] ?? null),
            region: Coerce::toString($data['region'] ?? null),
            grid: Coerce::toString($data['grid'] ?? null),
            gridIntensity: Coerce::toFloat($data['gridIntensity'] ?? null),
            gridZone: Coerce::toString($data['gridZone'] ?? null),
            gridBasis: Coerce::toString($data['gridBasis'] ?? null),
            pue: Coerce::toFloat($data['pue'] ?? null),
            kwh: Coerce::toFloat($data['kwh'] ?? null),
            kgCo2e: Coerce::toFloat($data['kgCo2e'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
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
            'vcpus' => $this->vcpus,
            'count' => $this->count,
            'region' => $this->region,
            'grid' => $this->grid,
            'gridIntensity' => $this->gridIntensity,
            'gridZone' => $this->gridZone,
            'gridBasis' => $this->gridBasis,
            'pue' => $this->pue,
            'kwh' => $this->kwh,
            'kgCo2e' => $this->kgCo2e,
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
