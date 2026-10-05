<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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

final class ExtendedSupportListResponse implements \JsonSerializable
{
    /**
     * @param list<ExtendedSupportFinding> $findings Most urgent first, then largest surcharge.
     * @param array{end-of-life: int, surcharged: int, unsupported: int, upcoming: int} $counts
     * @param list<ExtendedSupportTotal> $currentMonthly What surcharged and end-of-life findings cost now.
     * @param list<ExtendedSupportTotal> $upcomingMonthly What upcoming findings will add once they start.
     * @param array{windowDays: int, accounts: list<array{accountId: string, accountName: string, status: 'read'|'failed', error?: string}>, unattributed: list<array<string, mixed>>}|null $billing Present when billed charges were read for at least one account.
     */
    public function __construct(
        public readonly array $findings,
        public readonly int $totalCount,
        public readonly array $counts,
        public readonly array $currentMonthly,
        public readonly array $upcomingMonthly,
        public readonly int $leadDays,
        public readonly string $generatedAt,
        public readonly ?array $billing = null,
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
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): ExtendedSupportFinding => ExtendedSupportFinding::fromArray(Coerce::toArray($item))),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            counts: Coerce::toArray($data['counts'] ?? null),
            currentMonthly: Coerce::mapList($data['currentMonthly'] ?? null, static fn (mixed $item): ExtendedSupportTotal => ExtendedSupportTotal::fromArray(Coerce::toArray($item))),
            upcomingMonthly: Coerce::mapList($data['upcomingMonthly'] ?? null, static fn (mixed $item): ExtendedSupportTotal => ExtendedSupportTotal::fromArray(Coerce::toArray($item))),
            leadDays: Coerce::toInt($data['leadDays'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
            billing: Coerce::toArrayOrNull($data['billing'] ?? null),
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
            'findings' => array_map(static fn (ExtendedSupportFinding $item): array => $item->toArray(), $this->findings),
            'totalCount' => $this->totalCount,
            'counts' => $this->counts,
            'currentMonthly' => array_map(static fn (ExtendedSupportTotal $item): array => $item->toArray(), $this->currentMonthly),
            'upcomingMonthly' => array_map(static fn (ExtendedSupportTotal $item): array => $item->toArray(), $this->upcomingMonthly),
            'leadDays' => $this->leadDays,
            'generatedAt' => $this->generatedAt,
        ];
        if ($this->billing !== null) {
            $payload['billing'] = $this->billing;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
