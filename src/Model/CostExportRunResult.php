<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class CostExportRunResult implements \JsonSerializable
{
    /**
     * @param 'pending'|'succeeded'|'failed' $status
     * @param list<CostExportObject> $objects
     * @param string|null $collectionWatermark The newest day every cost-reporting account in the org had data for when the run started. Stamped into every row as `collection_watermark`; rows dated after it are still arriving.
     */
    public function __construct(
        public readonly string $exportId,
        public readonly string $status,
        public readonly array $objects,
        public readonly int $rowCount,
        public readonly ?string $collectionWatermark,
        public readonly ?string $error,
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
            exportId: Coerce::toString($data['exportId'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            objects: Coerce::mapList($data['objects'] ?? null, static fn (mixed $item): CostExportObject => CostExportObject::fromArray(Coerce::toArray($item))),
            rowCount: Coerce::toInt($data['rowCount'] ?? null),
            collectionWatermark: Coerce::toStringOrNull($data['collectionWatermark'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
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
            'exportId' => $this->exportId,
            'status' => $this->status,
            'objects' => array_map(static fn (CostExportObject $item): array => $item->toArray(), $this->objects),
            'rowCount' => $this->rowCount,
            'collectionWatermark' => $this->collectionWatermark,
            'error' => $this->error,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
