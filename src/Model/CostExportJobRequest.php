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

final class CostExportJobRequest implements \JsonSerializable
{
    /**
     * @param 'csv'|'ndjson'|'focus' $format `csv` / `ndjson`: Infrawrench's own columns (`day`, the group-by dimension or tag columns, `currency`, `amount`, `usage_amount`, `usage_unit`, `exported_at`, `collection_watermark`), plus per-day unit-cost columns (`unit_cost_metric`, `unit_cost_mode`, `unit_cost_scope_cost`, `unit_cost_metric_value`, `unit_cost_value`, `unit_cost_gap`) when the exported report draws a unit cost. `focus`: the FOCUS layout at full row grain, as CSV.
     * @param string|null $reportId Export a saved cost report's scope: its filters (with its saved filter expanded), its group-by as the row identity, its cost basis, and its unit cost when it draws one.
     * @param array<string, mixed>|null $query An ad-hoc scope instead of a saved report.
     * @param '1.4'|'1.3'|null $focusVersion FOCUS version for `format: focus`. Omitted means the latest (`1.4`).
     * @param string|null $from First day, `YYYY-MM-DD`. Required with `query`; a report defaults to its own range.
     * @param string|null $to Last day, inclusive.
     */
    public function __construct(
        public readonly string $format,
        public readonly ?string $reportId = null,
        public readonly ?array $query = null,
        public readonly ?string $focusVersion = null,
        public readonly ?string $from = null,
        public readonly ?string $to = null,
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
            format: Coerce::toString($data['format'] ?? null),
            reportId: Coerce::toStringOrNull($data['reportId'] ?? null),
            query: Coerce::toArrayOrNull($data['query'] ?? null),
            focusVersion: Coerce::toStringOrNull($data['focusVersion'] ?? null),
            from: Coerce::toStringOrNull($data['from'] ?? null),
            to: Coerce::toStringOrNull($data['to'] ?? null),
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
            'format' => $this->format,
        ];
        if ($this->reportId !== null) {
            $payload['reportId'] = $this->reportId;
        }
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }
        if ($this->focusVersion !== null) {
            $payload['focusVersion'] = $this->focusVersion;
        }
        if ($this->from !== null) {
            $payload['from'] = $this->from;
        }
        if ($this->to !== null) {
            $payload['to'] = $this->to;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
