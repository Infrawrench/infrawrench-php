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

final class NetworkFlowReportSeries implements \JsonSerializable
{
    /**
     * @param string $groupKey The group's key; `__other__` is everything outside the charted groups.
     * @param list<NetworkFlowReportPoint> $points
     */
    public function __construct(
        public readonly string $id,
        public readonly string $groupKey,
        public readonly string $label,
        public readonly string $currency,
        public readonly array $points,
        public readonly NetworkFlowReportTotals $total,
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
            groupKey: Coerce::toString($data['groupKey'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): NetworkFlowReportPoint => NetworkFlowReportPoint::fromArray(Coerce::toArray($item))),
            total: NetworkFlowReportTotals::fromArray(Coerce::toArray($data['total'] ?? null)),
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
            'groupKey' => $this->groupKey,
            'label' => $this->label,
            'currency' => $this->currency,
            'points' => array_map(static fn (NetworkFlowReportPoint $item): array => $item->toArray(), $this->points),
            'total' => $this->total->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
