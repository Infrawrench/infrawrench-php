<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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

final class CostCanvasRunResult implements \JsonSerializable
{
    /**
     * @param list<array<string, mixed>> $blocks One result per block, in spec order, each `{id, kind, ...}` with an `error` string when that block failed: `kpi` carries `kpi {value, unit, currency, previous, changePercent, from, to, note}`, `table` carries `table {columns, rows, currency}`, `chart`/`cost_report` carry the cost or unit-cost query response when chart data was requested, `budgets`, `anomalies` and `custom_graph` carry their rows or render spec, and `text` carries the narrative with KPI tokens filled in.
     */
    public function __construct(
        public readonly ?string $canvasId,
        public readonly string $name,
        public readonly string $ranAt,
        public readonly ?string $displayCurrency,
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
            canvasId: Coerce::toStringOrNull($data['canvasId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            ranAt: Coerce::toString($data['ranAt'] ?? null),
            displayCurrency: Coerce::toStringOrNull($data['displayCurrency'] ?? null),
            blocks: Coerce::mapList($data['blocks'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'canvasId' => $this->canvasId,
            'name' => $this->name,
            'ranAt' => $this->ranAt,
            'displayCurrency' => $this->displayCurrency,
            'blocks' => $this->blocks,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
