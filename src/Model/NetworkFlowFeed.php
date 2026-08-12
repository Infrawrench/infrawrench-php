<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class NetworkFlowFeed implements \JsonSerializable
{
    /**
     * @param bool $estimated Always true. Flow bytes come from logs that sample or drop under load and are priced at published list rates with no free tier, no volume tier and no negotiated discount modelled — the ranking is sound, the absolute figure will not reconcile to the invoice.
     * @param array{from: string, to: string} $range
     * @param list<NetworkFlowScopeSummary> $scopes
     * @param list<NetworkFlowPair> $topFlows
     * @param list<NetworkFlowAccountStatus> $accounts
     * @param list<NetworkFlowRateCard> $rateCards
     * @param array{bytes: float, estimatedCost: float, currency: string, unattributedBytes: float, truncatedBytes: float} $totals
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly int $initialLookbackDays,
        public readonly bool $estimated,
        public readonly array $range,
        public readonly array $scopes,
        public readonly array $topFlows,
        public readonly array $accounts,
        public readonly array $rateCards,
        public readonly array $totals,
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
            initialLookbackDays: Coerce::toInt($data['initialLookbackDays'] ?? null),
            estimated: Coerce::toBool($data['estimated'] ?? null),
            range: Coerce::toArray($data['range'] ?? null),
            scopes: Coerce::mapList($data['scopes'] ?? null, static fn (mixed $item): NetworkFlowScopeSummary => NetworkFlowScopeSummary::fromArray(Coerce::toArray($item))),
            topFlows: Coerce::mapList($data['topFlows'] ?? null, static fn (mixed $item): NetworkFlowPair => NetworkFlowPair::fromArray(Coerce::toArray($item))),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): NetworkFlowAccountStatus => NetworkFlowAccountStatus::fromArray(Coerce::toArray($item))),
            rateCards: Coerce::mapList($data['rateCards'] ?? null, static fn (mixed $item): NetworkFlowRateCard => NetworkFlowRateCard::fromArray(Coerce::toArray($item))),
            totals: Coerce::toArray($data['totals'] ?? null),
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
            'initialLookbackDays' => $this->initialLookbackDays,
            'estimated' => $this->estimated,
            'range' => $this->range,
            'scopes' => array_map(static fn (NetworkFlowScopeSummary $item): array => $item->toArray(), $this->scopes),
            'topFlows' => array_map(static fn (NetworkFlowPair $item): array => $item->toArray(), $this->topFlows),
            'accounts' => array_map(static fn (NetworkFlowAccountStatus $item): array => $item->toArray(), $this->accounts),
            'rateCards' => array_map(static fn (NetworkFlowRateCard $item): array => $item->toArray(), $this->rateCards),
            'totals' => $this->totals,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
