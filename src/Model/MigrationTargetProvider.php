<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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

final class MigrationTargetProvider implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param list<MigrationCategory::*> $categories
     * @param list<array{id: string, label: string, area: MigrationArea::*|null}> $regions
     * @param bool $needsAccount Pricing on this provider needs one of the org's accounts on it.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly array $categories,
        public readonly array $regions,
        public readonly bool $priceCatalog,
        public readonly bool $needsAccount,
        public readonly bool $hasAccount,
        public readonly bool $terraform,
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
            categories: Coerce::mapList($data['categories'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            priceCatalog: Coerce::toBool($data['priceCatalog'] ?? null),
            needsAccount: Coerce::toBool($data['needsAccount'] ?? null),
            hasAccount: Coerce::toBool($data['hasAccount'] ?? null),
            terraform: Coerce::toBool($data['terraform'] ?? null),
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
            'categories' => $this->categories,
            'regions' => $this->regions,
            'priceCatalog' => $this->priceCatalog,
            'needsAccount' => $this->needsAccount,
            'hasAccount' => $this->hasAccount,
            'terraform' => $this->terraform,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
