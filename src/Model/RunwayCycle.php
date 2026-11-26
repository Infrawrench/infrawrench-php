<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class RunwayCycle implements \JsonSerializable
{
    /**
     * @param string $end When the allowance resets.
     * @param float|null $projectedUsed Usage projected at the end of the cycle at the current rate.
     */
    public function __construct(
        public readonly string $start,
        public readonly string $end,
        public readonly ?float $projectedUsed,
        public readonly ?float $projectedUtilization,
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
            start: Coerce::toString($data['start'] ?? null),
            end: Coerce::toString($data['end'] ?? null),
            projectedUsed: Coerce::toFloatOrNull($data['projectedUsed'] ?? null),
            projectedUtilization: Coerce::toFloatOrNull($data['projectedUtilization'] ?? null),
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
            'start' => $this->start,
            'end' => $this->end,
            'projectedUsed' => $this->projectedUsed,
            'projectedUtilization' => $this->projectedUtilization,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
