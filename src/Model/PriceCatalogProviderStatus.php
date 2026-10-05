<?php

/*
 * infrawrench/sdk v1.55.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.55.0).
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

final class PriceCatalogProviderStatus implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param array{name: string, url: string} $source
     * @param list<array{id: string, label: string, family: PriceCatalogProductFamily::*}> $services
     * @param list<array{id: string, label: string, area: PriceCatalogArea::*}> $regions
     * @param PriceCatalogProviderState::* $state
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly bool $requiresCredentials,
        public readonly ?string $permission,
        public readonly array $source,
        public readonly float $refreshHours,
        public readonly array $services,
        public readonly array $regions,
        public readonly string $state,
        public readonly ?string $region,
        public readonly ?string $error,
        public readonly ?string $fetchedAt,
        public readonly bool $truncated,
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
            requiresCredentials: Coerce::toBool($data['requiresCredentials'] ?? null),
            permission: Coerce::toStringOrNull($data['permission'] ?? null),
            source: Coerce::toArray($data['source'] ?? null),
            refreshHours: Coerce::toFloat($data['refreshHours'] ?? null),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            state: Coerce::toString($data['state'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            fetchedAt: Coerce::toStringOrNull($data['fetchedAt'] ?? null),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'requiresCredentials' => $this->requiresCredentials,
            'permission' => $this->permission,
            'source' => $this->source,
            'refreshHours' => $this->refreshHours,
            'services' => $this->services,
            'regions' => $this->regions,
            'state' => $this->state,
            'region' => $this->region,
            'error' => $this->error,
            'fetchedAt' => $this->fetchedAt,
            'truncated' => $this->truncated,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
