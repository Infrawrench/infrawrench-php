<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

final class VirtualTagAllocation implements \JsonSerializable
{
    /**
     * @param float|null $percent `split` only. The shares of one rule sum to 100.
     * @param string|null $metricId `metric_split` only. The business metric whose daily value weights this share. A day where any share's metric has no value carries the last good day's weights forward, or splits evenly when there is none.
     */
    public function __construct(
        public readonly string $value,
        public readonly ?float $percent = null,
        public readonly ?string $metricId = null,
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
            value: Coerce::toString($data['value'] ?? null),
            percent: Coerce::toFloatOrNull($data['percent'] ?? null),
            metricId: Coerce::toStringOrNull($data['metricId'] ?? null),
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
            'value' => $this->value,
        ];
        if ($this->percent !== null) {
            $payload['percent'] = $this->percent;
        }
        if ($this->metricId !== null) {
            $payload['metricId'] = $this->metricId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
