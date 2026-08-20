<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class CostAlertInput implements \JsonSerializable
{
    /**
     * @param CostChangeCadence::* $cadence
     * @param CostChangeDirection::* $direction
     * @param list<CostAlertFilter>|null $filters
     * @param 'provider'|'account'|'service'|'region'|'resource'|'tag'|'charge_type'|'commitment'|null $groupBy Per-group fan-out. Null watches the scope's one total; a dimension watches each group against its own prior window, and each offending group fires its own event.
     * @param string|null $groupByTagKey Required when groupBy is tag.
     * @param int|null $thresholdPercent Percent of the prior window's spend the change must reach. At least one of the two thresholds must be set; when both are, BOTH must hold before the alert fires.
     * @param int|null $thresholdAmountCents Cents the change must reach.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $cadence,
        public readonly string $direction,
        public readonly ?array $filters = null,
        public readonly ?string $groupBy = null,
        public readonly ?string $groupByTagKey = null,
        public readonly ?int $thresholdPercent = null,
        public readonly ?int $thresholdAmountCents = null,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toString($data['name'] ?? null),
            cadence: Coerce::toString($data['cadence'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CostAlertFilter => CostAlertFilter::fromArray(Coerce::toArray($item)))),
            groupBy: Coerce::toStringOrNull($data['groupBy'] ?? null),
            groupByTagKey: Coerce::toStringOrNull($data['groupByTagKey'] ?? null),
            thresholdPercent: Coerce::toIntOrNull($data['thresholdPercent'] ?? null),
            thresholdAmountCents: Coerce::toIntOrNull($data['thresholdAmountCents'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
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
            'name' => $this->name,
            'cadence' => $this->cadence,
            'direction' => $this->direction,
        ];
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (CostAlertFilter $item): array => $item->toArray(), $this->filters);
        }
        if ($this->groupBy !== null) {
            $payload['groupBy'] = $this->groupBy;
        }
        if ($this->groupByTagKey !== null) {
            $payload['groupByTagKey'] = $this->groupByTagKey;
        }
        if ($this->thresholdPercent !== null) {
            $payload['thresholdPercent'] = $this->thresholdPercent;
        }
        if ($this->thresholdAmountCents !== null) {
            $payload['thresholdAmountCents'] = $this->thresholdAmountCents;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
