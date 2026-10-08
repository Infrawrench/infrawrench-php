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

final class CostAnomalySensitivity implements \JsonSerializable
{
    /**
     * @param bool $enabled The `feedbackTuning` setting; false means no key moves.
     * @param list<array{dimension: 'provider'|'service', dimensionKey: string, baseSigmas: float, sigmas: float, expectedCount: int, unexpectedCount: int, explanation: string}> $adjustments
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly int $windowDays,
        public readonly float $baseSigmas,
        public readonly array $adjustments,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            baseSigmas: Coerce::toFloat($data['baseSigmas'] ?? null),
            adjustments: Coerce::mapList($data['adjustments'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'enabled' => $this->enabled,
            'windowDays' => $this->windowDays,
            'baseSigmas' => $this->baseSigmas,
            'adjustments' => $this->adjustments,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
