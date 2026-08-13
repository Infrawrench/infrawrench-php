<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class IacReconciliationResponse implements \JsonSerializable
{
    /**
     * @param list<IacReconciledResource> $resources
     * @param list<IacStateOnlyResource> $stateOnly State entries with no inventory match — their own category.
     * @param array{inventoryTotal: int, managed: int, drifted: int, unmanaged: int, stateOnly: int, undiffable: int, stateResources: int, dataSourcesIgnored: int} $summary
     * @param list<array{pluginId: PluginId::*, resourceTypeId: string, reason: string}> $underivable Plugin resource types whose Terraform type could not be derived from the plugin's own export mapper. Reported rather than guessed.
     */
    public function __construct(
        public readonly IacState $state,
        public readonly array $resources,
        public readonly array $stateOnly,
        public readonly array $summary,
        public readonly array $underivable,
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
            state: IacState::fromArray(Coerce::toArray($data['state'] ?? null)),
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): IacReconciledResource => IacReconciledResource::fromArray(Coerce::toArray($item))),
            stateOnly: Coerce::mapList($data['stateOnly'] ?? null, static fn (mixed $item): IacStateOnlyResource => IacStateOnlyResource::fromArray(Coerce::toArray($item))),
            summary: Coerce::toArray($data['summary'] ?? null),
            underivable: Coerce::mapList($data['underivable'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'state' => $this->state->toArray(),
            'resources' => array_map(static fn (IacReconciledResource $item): array => $item->toArray(), $this->resources),
            'stateOnly' => array_map(static fn (IacStateOnlyResource $item): array => $item->toArray(), $this->stateOnly),
            'summary' => $this->summary,
            'underivable' => $this->underivable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
