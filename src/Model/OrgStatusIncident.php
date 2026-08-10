<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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

final class OrgStatusIncident implements \JsonSerializable
{
    /**
     * @param string $id Cached incident row id.
     * @param string $pluginName Provider display name, e.g. "DigitalOcean".
     * @param ProviderIncidentState::* $state
     * @param ProviderIncidentImpact::* $impact
     * @param string|null $url Deep link to the provider's incident page or status page.
     * @param string|null $lastUpdateText Plain-text body of the provider's most recent update.
     * @param list<string> $regions Plugin-native region ids the provider reports as affected.
     * @param list<string> $services Human-readable affected provider services/products.
     * @param bool $providerWide True when the incident affects the provider as a whole.
     * @param int $affectedResourceCount How many of the organization's resources the incident overlaps.
     * @param list<string> $affectedRegions The subset of `regions` where the organization actually holds resources.
     * @param list<ProviderIncidentResourceSample> $sampleResources Up to five of the overlapped resources, for display.
     * @param int $overlappingChangeCount Change-timeline events recorded on this provider during the incident window — "these N changes happened during an incident".
     */
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $title,
        public readonly string $state,
        public readonly string $impact,
        public readonly ?string $url,
        public readonly string $startedAt,
        public readonly ?string $resolvedAt,
        public readonly ?string $lastUpdateAt,
        public readonly ?string $lastUpdateText,
        public readonly array $regions,
        public readonly array $services,
        public readonly bool $providerWide,
        public readonly int $affectedResourceCount,
        public readonly array $affectedRegions,
        public readonly array $sampleResources,
        public readonly int $overlappingChangeCount,
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
            id: Coerce::toString($data['id'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            impact: Coerce::toString($data['impact'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            lastUpdateAt: Coerce::toStringOrNull($data['lastUpdateAt'] ?? null),
            lastUpdateText: Coerce::toStringOrNull($data['lastUpdateText'] ?? null),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            providerWide: Coerce::toBool($data['providerWide'] ?? null),
            affectedResourceCount: Coerce::toInt($data['affectedResourceCount'] ?? null),
            affectedRegions: Coerce::mapList($data['affectedRegions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sampleResources: Coerce::mapList($data['sampleResources'] ?? null, static fn (mixed $item): ProviderIncidentResourceSample => ProviderIncidentResourceSample::fromArray(Coerce::toArray($item))),
            overlappingChangeCount: Coerce::toInt($data['overlappingChangeCount'] ?? null),
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
            'id' => $this->id,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'title' => $this->title,
            'state' => $this->state,
            'impact' => $this->impact,
            'url' => $this->url,
            'startedAt' => $this->startedAt,
            'resolvedAt' => $this->resolvedAt,
            'lastUpdateAt' => $this->lastUpdateAt,
            'lastUpdateText' => $this->lastUpdateText,
            'regions' => $this->regions,
            'services' => $this->services,
            'providerWide' => $this->providerWide,
            'affectedResourceCount' => $this->affectedResourceCount,
            'affectedRegions' => $this->affectedRegions,
            'sampleResources' => array_map(static fn (ProviderIncidentResourceSample $item): array => $item->toArray(), $this->sampleResources),
            'overlappingChangeCount' => $this->overlappingChangeCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
