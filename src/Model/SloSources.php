<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class SloSources implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, url: string, status: 'up'|'down'|'unknown'}> $probes
     * @param list<array{resourceId: string, displayName: string, accountId: string, pluginId: PluginId::*, resourceTypeId: string, series: list<array{label: string, unit: string}>}> $metricResources
     */
    public function __construct(
        public readonly array $probes,
        public readonly array $metricResources,
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
            probes: Coerce::mapList($data['probes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            metricResources: Coerce::mapList($data['metricResources'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'probes' => $this->probes,
            'metricResources' => $this->metricResources,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
