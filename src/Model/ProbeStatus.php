<?php

/*
 * infrawrench/sdk v0.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.30.0).
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

final class ProbeStatus implements \JsonSerializable
{
    /**
     * @param 'ok'|'error' $phase
     * @param list<array<string, mixed>>|null $stats
     * @param list<array{timestamp: float, value: float}>|null $sparkline
     * @param list<array{typeLabel: string, count: int}>|null $resourceCounts
     */
    public function __construct(
        public readonly string $phase,
        public readonly ?string $error = null,
        public readonly ?array $stats = null,
        public readonly ?array $sparkline = null,
        public readonly ?string $sparklineLabel = null,
        public readonly ?array $resourceCounts = null,
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
            phase: Coerce::toString($data['phase'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            stats: Coerce::nullable($data['stats'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            sparkline: Coerce::nullable($data['sparkline'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            sparklineLabel: Coerce::toStringOrNull($data['sparklineLabel'] ?? null),
            resourceCounts: Coerce::nullable($data['resourceCounts'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
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
            'phase' => $this->phase,
        ];
        if ($this->error !== null) {
            $payload['error'] = $this->error;
        }
        if ($this->stats !== null) {
            $payload['stats'] = $this->stats;
        }
        if ($this->sparkline !== null) {
            $payload['sparkline'] = $this->sparkline;
        }
        if ($this->sparklineLabel !== null) {
            $payload['sparklineLabel'] = $this->sparklineLabel;
        }
        if ($this->resourceCounts !== null) {
            $payload['resourceCounts'] = $this->resourceCounts;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
