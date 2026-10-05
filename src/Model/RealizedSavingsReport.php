<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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

final class RealizedSavingsReport implements \JsonSerializable
{
    /**
     * @param list<RealizedSavingsTotal> $totals
     * @param list<RealizedSavingsMonth> $byMonth
     * @param list<RealizedSavingsBucket> $byKind
     * @param list<RealizedSavingsBucket> $byCostCentre
     * @param list<RealizedSavingsBucket> $byAccount
     * @param list<SavingsEventResult> $events
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly RealizedSavingsSettings $settings,
        public readonly array $totals,
        public readonly array $byMonth,
        public readonly array $byKind,
        public readonly array $byCostCentre,
        public readonly array $byAccount,
        public readonly array $events,
        public readonly int $shortfallCount,
        public readonly int $unmeasuredCount,
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
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            settings: RealizedSavingsSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
            totals: Coerce::mapList($data['totals'] ?? null, static fn (mixed $item): RealizedSavingsTotal => RealizedSavingsTotal::fromArray(Coerce::toArray($item))),
            byMonth: Coerce::mapList($data['byMonth'] ?? null, static fn (mixed $item): RealizedSavingsMonth => RealizedSavingsMonth::fromArray(Coerce::toArray($item))),
            byKind: Coerce::mapList($data['byKind'] ?? null, static fn (mixed $item): RealizedSavingsBucket => RealizedSavingsBucket::fromArray(Coerce::toArray($item))),
            byCostCentre: Coerce::mapList($data['byCostCentre'] ?? null, static fn (mixed $item): RealizedSavingsBucket => RealizedSavingsBucket::fromArray(Coerce::toArray($item))),
            byAccount: Coerce::mapList($data['byAccount'] ?? null, static fn (mixed $item): RealizedSavingsBucket => RealizedSavingsBucket::fromArray(Coerce::toArray($item))),
            events: Coerce::mapList($data['events'] ?? null, static fn (mixed $item): SavingsEventResult => SavingsEventResult::fromArray(Coerce::toArray($item))),
            shortfallCount: Coerce::toInt($data['shortfallCount'] ?? null),
            unmeasuredCount: Coerce::toInt($data['unmeasuredCount'] ?? null),
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
            'from' => $this->from,
            'to' => $this->to,
            'settings' => $this->settings->toArray(),
            'totals' => array_map(static fn (RealizedSavingsTotal $item): array => $item->toArray(), $this->totals),
            'byMonth' => array_map(static fn (RealizedSavingsMonth $item): array => $item->toArray(), $this->byMonth),
            'byKind' => array_map(static fn (RealizedSavingsBucket $item): array => $item->toArray(), $this->byKind),
            'byCostCentre' => array_map(static fn (RealizedSavingsBucket $item): array => $item->toArray(), $this->byCostCentre),
            'byAccount' => array_map(static fn (RealizedSavingsBucket $item): array => $item->toArray(), $this->byAccount),
            'events' => array_map(static fn (SavingsEventResult $item): array => $item->toArray(), $this->events),
            'shortfallCount' => $this->shortfallCount,
            'unmeasuredCount' => $this->unmeasuredCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
