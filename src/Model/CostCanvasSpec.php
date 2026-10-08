<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

/**
 * The structured query spec. It holds queries, never numbers: running the canvas re-executes every
 * block, so a refresh needs no model call. Validated strictly on write; there is no field that
 * takes a query string or SQL.
 */
final class CostCanvasSpec implements \JsonSerializable
{
    /**
     * @param list<array{id: string, kind: 'text', text: string}|array{id: string, kind: 'kpi', title: string, metric: array<string, mixed>, comparePreviousPeriod?: bool}|array{id: string, kind: 'chart', title: string, config: array<string, mixed>}|array{id: string, kind: 'table', title: string, query: array<string, mixed>}|array{id: string, kind: 'budgets', title: string, budgetIds?: list<string>}|array{id: string, kind: 'anomalies', title: string, days?: int, limit?: int}|array{id: string, kind: 'cost_report', title?: string, reportId: string}|array{id: string, kind: 'custom_graph', title?: string, graphId: string}> $blocks
     */
    public function __construct(
        public readonly float $version,
        public readonly array $blocks,
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
            version: Coerce::toFloat($data['version'] ?? null),
            blocks: Coerce::toList($data['blocks'] ?? null),
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
            'version' => $this->version,
            'blocks' => $this->blocks,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
