<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

/** Over every finding the caller can see, ignoring filters. */
final class SavingsFindingsSummary implements \JsonSerializable
{
    /**
     * @param array{ready: int, in_progress: int, completed: int, archived: int} $counts
     * @param list<SavingsFindingMoney|null> $potentialMonthly Monthly savings of open findings, per currency, largest first.
     * @param int $unpricedOpenCount Open findings with no price; never summed.
     * @param list<SavingsFindingMoney|null>|null $realized Realized savings over the trailing `realizedWindowDays`, per currency (the realized savings report). Null without `costs:read`.
     * @param list<array{currency: string, rate: float}>|null $savingsRate Realized ÷ (realized + potential) per currency: the share of the identified monthly opportunity already captured. Currencies with nothing on either side are omitted.
     */
    public function __construct(
        public readonly array $counts,
        public readonly array $potentialMonthly,
        public readonly int $unpricedOpenCount,
        public readonly ?array $realized,
        public readonly int $realizedWindowDays,
        public readonly ?array $savingsRate,
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
            counts: Coerce::toArray($data['counts'] ?? null),
            potentialMonthly: Coerce::mapList($data['potentialMonthly'] ?? null, static fn (mixed $item): ?SavingsFindingMoney => Coerce::nullable($item, static fn (mixed $value): SavingsFindingMoney => SavingsFindingMoney::fromArray(Coerce::toArray($value)))),
            unpricedOpenCount: Coerce::toInt($data['unpricedOpenCount'] ?? null),
            realized: Coerce::nullable($data['realized'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): ?SavingsFindingMoney => Coerce::nullable($item, static fn (mixed $value): SavingsFindingMoney => SavingsFindingMoney::fromArray(Coerce::toArray($value))))),
            realizedWindowDays: Coerce::toInt($data['realizedWindowDays'] ?? null),
            savingsRate: Coerce::nullable($data['savingsRate'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
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
            'counts' => $this->counts,
            'potentialMonthly' => array_map(static fn (?SavingsFindingMoney $item): array => $item?->toArray(), $this->potentialMonthly),
            'unpricedOpenCount' => $this->unpricedOpenCount,
            'realized' => $this->realized === null ? null : array_map(static fn (?SavingsFindingMoney $item): array => $item?->toArray(), $this->realized),
            'realizedWindowDays' => $this->realizedWindowDays,
            'savingsRate' => $this->savingsRate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
