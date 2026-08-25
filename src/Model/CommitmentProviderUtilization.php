<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class CommitmentProviderUtilization implements \JsonSerializable
{
    /**
     * @param int $grainDays Trailing window the aggregate covers (1, 7, 30).
     * @param float $percentage Utilization percentage 0–100, exactly as the provider reports it.
     */
    public function __construct(
        public readonly int $grainDays,
        public readonly float $percentage,
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
            grainDays: Coerce::toInt($data['grainDays'] ?? null),
            percentage: Coerce::toFloat($data['percentage'] ?? null),
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
            'grainDays' => $this->grainDays,
            'percentage' => $this->percentage,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
