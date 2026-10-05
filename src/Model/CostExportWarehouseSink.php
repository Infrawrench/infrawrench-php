<?php

/*
 * infrawrench/sdk v1.52.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.52.0).
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

final class CostExportWarehouseSink implements \JsonSerializable
{
    /**
     * @param list<CostExportWarehouseTargetField> $targetFields
     * @param list<array{id: string, name: string}> $accounts
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly string $label,
        public readonly ?string $description,
        public readonly array $targetFields,
        public readonly array $accounts,
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
            displayName: Coerce::toString($data['displayName'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            targetFields: Coerce::mapList($data['targetFields'] ?? null, static fn (mixed $item): CostExportWarehouseTargetField => CostExportWarehouseTargetField::fromArray(Coerce::toArray($item))),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'displayName' => $this->displayName,
            'label' => $this->label,
            'description' => $this->description,
            'targetFields' => array_map(static fn (CostExportWarehouseTargetField $item): array => $item->toArray(), $this->targetFields),
            'accounts' => $this->accounts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
