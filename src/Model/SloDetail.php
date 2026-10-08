<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class SloDetail implements \JsonSerializable
{
    /** @param list<SloBucket> $buckets Hourly events over the window, oldest first. */
    public function __construct(
        public readonly Slo $slo,
        public readonly array $buckets,
        public readonly ?SloActiveFreeze $activeFreeze,
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
            slo: Slo::fromArray(Coerce::toArray($data['slo'] ?? null)),
            buckets: Coerce::mapList($data['buckets'] ?? null, static fn (mixed $item): SloBucket => SloBucket::fromArray(Coerce::toArray($item))),
            activeFreeze: Coerce::nullable($data['activeFreeze'] ?? null, static fn (mixed $value): SloActiveFreeze => SloActiveFreeze::fromArray(Coerce::toArray($value))),
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
            'slo' => $this->slo->toArray(),
            'buckets' => array_map(static fn (SloBucket $item): array => $item->toArray(), $this->buckets),
            'activeFreeze' => $this->activeFreeze?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
