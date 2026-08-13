<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class RightsizingListResponse implements \JsonSerializable
{
    /**
     * @param list<OversizedAccountGroup> $accounts Groups sorted by account name.
     * @param int $windowDays Days of stored metrics the percentiles cover.
     */
    public function __construct(
        public readonly array $accounts,
        public readonly int $totalCount,
        public readonly int $windowDays,
        public readonly string $generatedAt,
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
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): OversizedAccountGroup => OversizedAccountGroup::fromArray(Coerce::toArray($item))),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'accounts' => array_map(static fn (OversizedAccountGroup $item): array => $item->toArray(), $this->accounts),
            'totalCount' => $this->totalCount,
            'windowDays' => $this->windowDays,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
