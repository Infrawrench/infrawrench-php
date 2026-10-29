<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ResourceReportRow implements \JsonSerializable
{
    /**
     * @param string $id The resource id the resource detail view is addressed by.
     * @param array<string, string|null> $values Text per non-cost column id; null when the resource has no value.
     * @param array<string, list<ResourceReportMoney>> $costs Spend per cost column id, one entry per currency, largest first. Empty when the resource had no cost rows in the window.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly array $values,
        public readonly array $costs,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            values: Coerce::mapValues($data['values'] ?? null, static fn (mixed $item): ?string => Coerce::toStringOrNull($item)),
            costs: Coerce::mapValues($data['costs'] ?? null, static fn (mixed $item): array => Coerce::mapList($item, static fn (mixed $item): ResourceReportMoney => ResourceReportMoney::fromArray(Coerce::toArray($item)))),
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
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'values' => $this->values,
            'costs' => array_map(static fn (array $item): array => array_map(static fn (ResourceReportMoney $item): array => $item->toArray(), $item), $this->costs),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
