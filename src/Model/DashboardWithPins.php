<?php

/*
 * infrawrench/sdk v0.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.28.0).
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

final class DashboardWithPins implements \JsonSerializable
{
    /**
     * @param list<DashboardPin> $pins
     * @param list<DashboardWorkflowPin> $workflowPins
     * @param list<DashboardWidget> $widgets
     */
    public function __construct(
        public readonly DashboardFull $dashboard,
        public readonly array $pins,
        public readonly array $workflowPins,
        public readonly array $widgets,
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
            dashboard: DashboardFull::fromArray(Coerce::toArray($data['dashboard'] ?? null)),
            pins: Coerce::mapList($data['pins'] ?? null, static fn (mixed $item): DashboardPin => DashboardPin::fromArray(Coerce::toArray($item))),
            workflowPins: Coerce::mapList($data['workflowPins'] ?? null, static fn (mixed $item): DashboardWorkflowPin => DashboardWorkflowPin::fromArray(Coerce::toArray($item))),
            widgets: Coerce::mapList($data['widgets'] ?? null, static fn (mixed $item): DashboardWidget => DashboardWidget::fromArray(Coerce::toArray($item))),
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
            'dashboard' => $this->dashboard->toArray(),
            'pins' => array_map(static fn (DashboardPin $item): array => $item->toArray(), $this->pins),
            'workflowPins' => array_map(static fn (DashboardWorkflowPin $item): array => $item->toArray(), $this->workflowPins),
            'widgets' => array_map(static fn (DashboardWidget $item): array => $item->toArray(), $this->widgets),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
