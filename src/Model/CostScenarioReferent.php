<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class CostScenarioReferent implements \JsonSerializable
{
    /**
     * @param 'budget'|'cost_report'|'cost_graph_widget' $kind
     * @param string $id Budget id, report id, or dashboard-widget id.
     * @param string|null $dashboardId Set for `cost_graph_widget` referents.
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $dashboardId = null,
        public readonly ?string $dashboardName = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            dashboardId: Coerce::toStringOrNull($data['dashboardId'] ?? null),
            dashboardName: Coerce::toStringOrNull($data['dashboardName'] ?? null),
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
            'kind' => $this->kind,
            'id' => $this->id,
            'name' => $this->name,
        ];
        if ($this->dashboardId !== null) {
            $payload['dashboardId'] = $this->dashboardId;
        }
        if ($this->dashboardName !== null) {
            $payload['dashboardName'] = $this->dashboardName;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
