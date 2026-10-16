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

final class SeatListResponse implements \JsonSerializable
{
    /**
     * @param list<Seat> $seats
     * @param list<SeatFinding> $findings Largest saving first; at most one per seat.
     * @param list<SeatTotal> $savingsMonthly
     * @param list<SeatTotal> $spendMonthly
     * @param array{seats: int, inactive: int, duplicate: int, downgrade: int, unknownActivity: int, unpriced: int} $counts
     * @param list<array{accountId: string, accountName: string, pluginId: PluginId::*, pluginName: string, seatCount: int, lastPolledAt: string|null, lastError: string|null}> $accounts
     */
    public function __construct(
        public readonly int $inactiveDays,
        public readonly array $seats,
        public readonly array $findings,
        public readonly array $savingsMonthly,
        public readonly array $spendMonthly,
        public readonly array $counts,
        public readonly array $accounts,
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
            inactiveDays: Coerce::toInt($data['inactiveDays'] ?? null),
            seats: Coerce::mapList($data['seats'] ?? null, static fn (mixed $item): Seat => Seat::fromArray(Coerce::toArray($item))),
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): SeatFinding => SeatFinding::fromArray(Coerce::toArray($item))),
            savingsMonthly: Coerce::mapList($data['savingsMonthly'] ?? null, static fn (mixed $item): SeatTotal => SeatTotal::fromArray(Coerce::toArray($item))),
            spendMonthly: Coerce::mapList($data['spendMonthly'] ?? null, static fn (mixed $item): SeatTotal => SeatTotal::fromArray(Coerce::toArray($item))),
            counts: Coerce::toArray($data['counts'] ?? null),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'inactiveDays' => $this->inactiveDays,
            'seats' => array_map(static fn (Seat $item): array => $item->toArray(), $this->seats),
            'findings' => array_map(static fn (SeatFinding $item): array => $item->toArray(), $this->findings),
            'savingsMonthly' => array_map(static fn (SeatTotal $item): array => $item->toArray(), $this->savingsMonthly),
            'spendMonthly' => array_map(static fn (SeatTotal $item): array => $item->toArray(), $this->spendMonthly),
            'counts' => $this->counts,
            'accounts' => $this->accounts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
