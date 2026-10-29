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

final class ScorecardOverview implements \JsonSerializable
{
    /**
     * @param list<Scorecard> $scorecards
     * @param list<array{id: string, name: string, slug: string, tier: float|null, ownerTeam: string|null}> $services
     * @param list<ScorecardResult> $results
     */
    public function __construct(
        public readonly array $scorecards,
        public readonly array $services,
        public readonly array $results,
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
            scorecards: Coerce::mapList($data['scorecards'] ?? null, static fn (mixed $item): Scorecard => Scorecard::fromArray(Coerce::toArray($item))),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            results: Coerce::mapList($data['results'] ?? null, static fn (mixed $item): ScorecardResult => ScorecardResult::fromArray(Coerce::toArray($item))),
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
            'scorecards' => array_map(static fn (Scorecard $item): array => $item->toArray(), $this->scorecards),
            'services' => $this->services,
            'results' => array_map(static fn (ScorecardResult $item): array => $item->toArray(), $this->results),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
