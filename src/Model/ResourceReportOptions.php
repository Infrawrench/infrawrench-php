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

final class ResourceReportOptions implements \JsonSerializable
{
    /**
     * @param list<array{value: string, label: string, count: int}> $providers
     * @param list<array{value: string, label: string, count: int, pluginId: string}> $accounts
     * @param list<array{pluginId: string, resourceTypeId: string, label: string, count: int}> $resourceTypes
     * @param list<array{value: string, label: string, count: int}> $regions
     * @param list<array{value: string, label: string, count: int}> $statuses
     * @param list<array{key: string, label: string, count: int, declared: bool}> $fields Metadata fields the requested resource types expose.
     * @param list<string> $tagKeys
     * @param list<string> $preferredTagKeys
     * @param list<string> $virtualTagKeys Empty without `costs:read`.
     */
    public function __construct(
        public readonly array $providers,
        public readonly array $accounts,
        public readonly array $resourceTypes,
        public readonly array $regions,
        public readonly array $statuses,
        public readonly array $fields,
        public readonly array $tagKeys,
        public readonly array $preferredTagKeys,
        public readonly array $virtualTagKeys,
        public readonly bool $costAvailable,
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
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            resourceTypes: Coerce::mapList($data['resourceTypes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            statuses: Coerce::mapList($data['statuses'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            fields: Coerce::mapList($data['fields'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            tagKeys: Coerce::mapList($data['tagKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            preferredTagKeys: Coerce::mapList($data['preferredTagKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            virtualTagKeys: Coerce::mapList($data['virtualTagKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            costAvailable: Coerce::toBool($data['costAvailable'] ?? null),
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
            'providers' => $this->providers,
            'accounts' => $this->accounts,
            'resourceTypes' => $this->resourceTypes,
            'regions' => $this->regions,
            'statuses' => $this->statuses,
            'fields' => $this->fields,
            'tagKeys' => $this->tagKeys,
            'preferredTagKeys' => $this->preferredTagKeys,
            'virtualTagKeys' => $this->virtualTagKeys,
            'costAvailable' => $this->costAvailable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
