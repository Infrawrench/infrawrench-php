<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class CostReport implements \JsonSerializable
{
    /**
     * @param string|null $folderId Folder the report is filed under (see /cost-report-folders); null is the top level of the Reports list. Moving a report is this same PUT with a different folderId; an id from another org is a 400. Deleting a folder never deletes its reports — they fall back to the top level.
     * @param list<CostReportPlacement> $placements The dashboards carrying a `cost_report` card for this report. Empty is normal — a report exists, and can be run, whether or not any dashboard shows it. Deleting the report removes these cards; removing a card leaves the report alone.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly CostGraphConfig $config,
        public readonly ?string $folderId,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly array $placements,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            config: CostGraphConfig::fromArray(Coerce::toArray($data['config'] ?? null)),
            folderId: Coerce::toStringOrNull($data['folderId'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            placements: Coerce::mapList($data['placements'] ?? null, static fn (mixed $item): CostReportPlacement => CostReportPlacement::fromArray(Coerce::toArray($item))),
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
            'name' => $this->name,
            'description' => $this->description,
            'config' => $this->config->toArray(),
            'folderId' => $this->folderId,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'placements' => array_map(static fn (CostReportPlacement $item): array => $item->toArray(), $this->placements),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
