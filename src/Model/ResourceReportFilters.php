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

final class ResourceReportFilters implements \JsonSerializable
{
    /**
     * @param list<string> $pluginIds Providers; empty does not filter.
     * @param list<string> $accountIds
     * @param list<array{pluginId: string, resourceTypeId: string}> $resourceTypes Resource types, each with its plugin, since type ids repeat across plugins.
     * @param list<string> $regions Matched exactly, as synced.
     * @param list<string> $statuses Matched ignoring case.
     * @param list<ResourceReportTagFilter> $tags AND-ed.
     * @param string|null $createdFrom Inclusive UTC day on the created column.
     */
    public function __construct(
        public readonly array $pluginIds,
        public readonly array $accountIds,
        public readonly array $resourceTypes,
        public readonly array $regions,
        public readonly array $statuses,
        public readonly array $tags,
        public readonly ?string $nameContains,
        public readonly ?string $createdFrom,
        public readonly ?string $createdTo,
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
            pluginIds: Coerce::mapList($data['pluginIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            resourceTypes: Coerce::mapList($data['resourceTypes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            statuses: Coerce::mapList($data['statuses'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            tags: Coerce::mapList($data['tags'] ?? null, static fn (mixed $item): ResourceReportTagFilter => ResourceReportTagFilter::fromArray(Coerce::toArray($item))),
            nameContains: Coerce::toStringOrNull($data['nameContains'] ?? null),
            createdFrom: Coerce::toStringOrNull($data['createdFrom'] ?? null),
            createdTo: Coerce::toStringOrNull($data['createdTo'] ?? null),
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
            'pluginIds' => $this->pluginIds,
            'accountIds' => $this->accountIds,
            'resourceTypes' => $this->resourceTypes,
            'regions' => $this->regions,
            'statuses' => $this->statuses,
            'tags' => array_map(static fn (ResourceReportTagFilter $item): array => $item->toArray(), $this->tags),
            'nameContains' => $this->nameContains,
            'createdFrom' => $this->createdFrom,
            'createdTo' => $this->createdTo,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
