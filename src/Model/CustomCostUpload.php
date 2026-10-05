<?php

/*
 * infrawrench/sdk v1.59.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.59.0).
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

final class CustomCostUpload implements \JsonSerializable
{
    /**
     * @param 'csv'|'focus'|'rows' $format
     * @param 'append'|'replace' $mode
     * @param 'uploading'|'complete'|'replaced' $status `uploading` until complete is called (an interrupted upload stays here and can be deleted); `replaced` once a later replace upload superseded every row it held.
     * @param int $rowCount Daily rows this upload still holds.
     * @param array<string, float> $totals Currency code → cash amount this upload still holds.
     * @param array{id: string, name: string|null, email: string|null}|null $uploadedBy
     * @param 'web'|'desktop'|'cli'|'api' $via
     */
    public function __construct(
        public readonly string $id,
        public readonly string $sourceId,
        public readonly ?string $fileName,
        public readonly string $format,
        public readonly string $mode,
        public readonly string $status,
        public readonly string $fromDate,
        public readonly string $toDate,
        public readonly int $rowCount,
        public readonly array $totals,
        public readonly ?array $uploadedBy,
        public readonly string $via,
        public readonly string $createdAt,
        public readonly ?string $completedAt,
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
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            fileName: Coerce::toStringOrNull($data['fileName'] ?? null),
            format: Coerce::toString($data['format'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            fromDate: Coerce::toString($data['fromDate'] ?? null),
            toDate: Coerce::toString($data['toDate'] ?? null),
            rowCount: Coerce::toInt($data['rowCount'] ?? null),
            totals: Coerce::mapValues($data['totals'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            uploadedBy: Coerce::toArrayOrNull($data['uploadedBy'] ?? null),
            via: Coerce::toString($data['via'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
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
            'sourceId' => $this->sourceId,
            'fileName' => $this->fileName,
            'format' => $this->format,
            'mode' => $this->mode,
            'status' => $this->status,
            'fromDate' => $this->fromDate,
            'toDate' => $this->toDate,
            'rowCount' => $this->rowCount,
            'totals' => $this->totals,
            'uploadedBy' => $this->uploadedBy,
            'via' => $this->via,
            'createdAt' => $this->createdAt,
            'completedAt' => $this->completedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
