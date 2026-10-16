<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class NetworkFlowReportOptions implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, pluginId: string, recut: bool}> $accounts
     * @param list<string> $networks
     * @param list<string> $regions
     * @param list<string> $zones
     * @param list<string> $services
     * @param list<string> $resourceTypes
     * @param list<array{ref: string, label: string, resourceTypeId: string, side: 'source'|'destination'|'both'}> $endpoints
     * @param list<NetworkFlowTrafficClass::*> $trafficClasses
     */
    public function __construct(
        public readonly array $accounts,
        public readonly array $networks,
        public readonly array $regions,
        public readonly array $zones,
        public readonly array $services,
        public readonly array $resourceTypes,
        public readonly array $endpoints,
        public readonly array $trafficClasses,
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
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            networks: Coerce::mapList($data['networks'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            zones: Coerce::mapList($data['zones'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            resourceTypes: Coerce::mapList($data['resourceTypes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            endpoints: Coerce::mapList($data['endpoints'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            trafficClasses: Coerce::mapList($data['trafficClasses'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'accounts' => $this->accounts,
            'networks' => $this->networks,
            'regions' => $this->regions,
            'zones' => $this->zones,
            'services' => $this->services,
            'resourceTypes' => $this->resourceTypes,
            'endpoints' => $this->endpoints,
            'trafficClasses' => $this->trafficClasses,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
