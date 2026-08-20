<?php

/*
 * infrawrench/sdk v1.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.34.0).
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

final class QuotaTrend implements \JsonSerializable
{
    /**
     * @param float|null $perDay Least-squares change in utilisation fraction per day over the last 14 days of snapshots. Null when fewer than 3 readings exist, or when every reading shares an instant. Null means 'not enough history', never 'no risk'.
     * @param float|null $daysToExhaustion Days until used reaches limit at the fitted rate. Null when the trend is flat or falling, when the quota is already at its limit, or when exhaustion lands beyond the 30-day horizon.
     * @param int $points Snapshots the fit used.
     */
    public function __construct(
        public readonly ?float $perDay,
        public readonly ?float $daysToExhaustion,
        public readonly int $points,
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
            perDay: Coerce::toFloatOrNull($data['perDay'] ?? null),
            daysToExhaustion: Coerce::toFloatOrNull($data['daysToExhaustion'] ?? null),
            points: Coerce::toInt($data['points'] ?? null),
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
            'perDay' => $this->perDay,
            'daysToExhaustion' => $this->daysToExhaustion,
            'points' => $this->points,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
