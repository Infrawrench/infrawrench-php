<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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

final class CreditBurndown implements \JsonSerializable
{
    /**
     * @param list<CreditPot> $pots
     * @param list<CreditPollFailure> $failures
     * @param list<string> $pendingAccountIds Credit-capable accounts never yet collected — named rather than omitted.
     */
    public function __construct(
        public readonly array $pots,
        public readonly array $failures,
        public readonly array $pendingAccountIds,
        public readonly int $burnWindowDays,
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
            pots: Coerce::mapList($data['pots'] ?? null, static fn (mixed $item): CreditPot => CreditPot::fromArray(Coerce::toArray($item))),
            failures: Coerce::mapList($data['failures'] ?? null, static fn (mixed $item): CreditPollFailure => CreditPollFailure::fromArray(Coerce::toArray($item))),
            pendingAccountIds: Coerce::mapList($data['pendingAccountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            burnWindowDays: Coerce::toInt($data['burnWindowDays'] ?? null),
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
            'pots' => array_map(static fn (CreditPot $item): array => $item->toArray(), $this->pots),
            'failures' => array_map(static fn (CreditPollFailure $item): array => $item->toArray(), $this->failures),
            'pendingAccountIds' => $this->pendingAccountIds,
            'burnWindowDays' => $this->burnWindowDays,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
