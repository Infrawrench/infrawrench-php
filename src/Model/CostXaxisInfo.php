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

/**
 * Set when the request put a dimension on the X axis. Every series point (and every comparison
 * point) is then keyed by dimension value rather than date, and the comparison is folded onto the
 * current period's values so each value is compared with itself.
 *
 * Spec schema: `CostXAxisInfo`.
 */
final class CostXaxisInfo implements \JsonSerializable
{
    /**
     * @param CostDimension::* $dimension
     * @param 'none'|'dimension'|'date' $segment What each series is: one per `groupBy` value (`dimension`), one per date bin (`date`; the series key is the bin start), or one unsegmented series per currency (`none`).
     * @param list<array{key: string, label: string}> $values The axis values in drawing order: ranked by spend, then `__other__`.
     */
    public function __construct(
        public readonly string $dimension,
        public readonly string $segment,
        public readonly array $values,
        public readonly ?string $tagKey = null,
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
            dimension: Coerce::toString($data['dimension'] ?? null),
            segment: Coerce::toString($data['segment'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
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
            'dimension' => $this->dimension,
            'segment' => $this->segment,
            'values' => $this->values,
        ];
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
