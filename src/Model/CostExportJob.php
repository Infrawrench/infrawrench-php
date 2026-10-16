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

final class CostExportJob implements \JsonSerializable
{
    /**
     * @param 'queued'|'running'|'succeeded'|'failed'|'cancelled'|'expired' $status `queued` until a gateway process claims it, `running` while the file is written, then `succeeded` (download it), `failed` (see `error`), `cancelled`, or `expired` once the file has been deleted, 24 hours after it finished.
     * @param 'csv'|'ndjson'|'focus' $format `csv` / `ndjson`: Infrawrench's own columns (`day`, the group-by dimension or tag columns, `currency`, `amount`, `usage_amount`, `usage_unit`, `exported_at`, `collection_watermark`), plus per-day unit-cost columns (`unit_cost_metric`, `unit_cost_mode`, `unit_cost_scope_cost`, `unit_cost_metric_value`, `unit_cost_value`, `unit_cost_gap`) when the exported report draws a unit cost. `focus`: the FOCUS layout at full row grain, as CSV.
     * @param '1.4'|'1.3'|null $focusVersion
     * @param array{kind: 'report'|'query', reportId: string|null, reportName: string|null, unitCostMetric: string|null} $source
     * @param float $progress 0 to 1: the share of the range written so far.
     * @param float $byteCount Uncompressed bytes written so far.
     * @param string|null $expiresAt When the file is deleted: 24 hours after it finished.
     * @param string|null $downloadUrl Path of `GET /costs/exports/jobs/{jobId}/download` once `succeeded`, else null. Authenticated like every other route.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $status,
        public readonly string $format,
        public readonly ?string $focusVersion,
        public readonly string $from,
        public readonly string $to,
        public readonly array $source,
        public readonly float $progress,
        public readonly int $rowCount,
        public readonly float $byteCount,
        public readonly ?string $error,
        public readonly string $fileName,
        public readonly string $contentType,
        public readonly string $createdAt,
        public readonly ?string $startedAt,
        public readonly ?string $finishedAt,
        public readonly ?string $expiresAt,
        public readonly ?string $downloadUrl,
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
            status: Coerce::toString($data['status'] ?? null),
            format: Coerce::toString($data['format'] ?? null),
            focusVersion: Coerce::toStringOrNull($data['focusVersion'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            source: Coerce::toArray($data['source'] ?? null),
            progress: Coerce::toFloat($data['progress'] ?? null),
            rowCount: Coerce::toInt($data['rowCount'] ?? null),
            byteCount: Coerce::toFloat($data['byteCount'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            fileName: Coerce::toString($data['fileName'] ?? null),
            contentType: Coerce::toString($data['contentType'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            startedAt: Coerce::toStringOrNull($data['startedAt'] ?? null),
            finishedAt: Coerce::toStringOrNull($data['finishedAt'] ?? null),
            expiresAt: Coerce::toStringOrNull($data['expiresAt'] ?? null),
            downloadUrl: Coerce::toStringOrNull($data['downloadUrl'] ?? null),
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
            'status' => $this->status,
            'format' => $this->format,
            'focusVersion' => $this->focusVersion,
            'from' => $this->from,
            'to' => $this->to,
            'source' => $this->source,
            'progress' => $this->progress,
            'rowCount' => $this->rowCount,
            'byteCount' => $this->byteCount,
            'error' => $this->error,
            'fileName' => $this->fileName,
            'contentType' => $this->contentType,
            'createdAt' => $this->createdAt,
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
            'expiresAt' => $this->expiresAt,
            'downloadUrl' => $this->downloadUrl,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
