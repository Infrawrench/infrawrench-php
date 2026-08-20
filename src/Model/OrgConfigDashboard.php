<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class OrgConfigDashboard implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param list<array{kind: 'widget', widgetKind: 'cost_graph'|'cost_report'|'budget'|'custom_graph', title?: string, config?: array<string, mixed>, budgetKey?: string, graphKey?: string, width?: int, height?: int}|array{kind: 'workflow', workflowKey: string}|array{kind: 'resource', pluginId: string, resourceTypeId: string, externalId: string, account: string, width?: int, height?: int}>|null $cards
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly ?bool $isDefault = null,
        public readonly ?array $cards = null,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            isDefault: Coerce::toBoolOrNull($data['isDefault'] ?? null),
            cards: Coerce::toListOrNull($data['cards'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'key' => $this->key,
            'name' => $this->name,
        ];
        if ($this->isDefault !== null) {
            $payload['isDefault'] = $this->isDefault;
        }
        if ($this->cards !== null) {
            $payload['cards'] = $this->cards;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
