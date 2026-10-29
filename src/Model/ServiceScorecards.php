<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ServiceScorecards implements \JsonSerializable
{
    /**
     * @param list<ScorecardResult> $results
     * @param array<string, list<ScorecardHistoryPoint>> $history Per scorecard id, oldest first, at most 90 days.
     */
    public function __construct(
        public readonly array $results,
        public readonly array $history,
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
            results: Coerce::mapList($data['results'] ?? null, static fn (mixed $item): ScorecardResult => ScorecardResult::fromArray(Coerce::toArray($item))),
            history: Coerce::mapValues($data['history'] ?? null, static fn (mixed $item): array => Coerce::mapList($item, static fn (mixed $item): ScorecardHistoryPoint => ScorecardHistoryPoint::fromArray(Coerce::toArray($item)))),
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
            'results' => array_map(static fn (ScorecardResult $item): array => $item->toArray(), $this->results),
            'history' => array_map(static fn (array $item): array => array_map(static fn (ScorecardHistoryPoint $item): array => $item->toArray(), $item), $this->history),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
