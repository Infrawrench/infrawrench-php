<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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

final class WallboardResponse implements \JsonSerializable
{
    /**
     * @param 'ok'|'degraded'|'down' $status Three states rather than five, because at four metres a person distinguishes three colours reliably and nothing more. `down` is reserved for the two things that mean customers are affected now — a sev1 incident or a probe that is down; everything else that is wrong is `degraded`. A source that could not be read is `degraded` and never `ok`.
     * @param list<WallboardTile> $tiles
     * @param list<WallboardIncidentLine> $incidents Unresolved incidents, newest first.
     * @param list<WallboardFailureLine> $failures Probes that are down, accounts that stopped syncing.
     * @param list<string> $failedSources Sources that could not be read, **named on the screen**. A wallboard showing green because a query failed is worse than a blank one — it is actively telling the room the wrong thing.
     */
    public function __construct(
        public readonly string $status,
        public readonly array $tiles,
        public readonly array $incidents,
        public readonly array $failures,
        public readonly array $failedSources,
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
            status: Coerce::toString($data['status'] ?? null),
            tiles: Coerce::mapList($data['tiles'] ?? null, static fn (mixed $item): WallboardTile => WallboardTile::fromArray(Coerce::toArray($item))),
            incidents: Coerce::mapList($data['incidents'] ?? null, static fn (mixed $item): WallboardIncidentLine => WallboardIncidentLine::fromArray(Coerce::toArray($item))),
            failures: Coerce::mapList($data['failures'] ?? null, static fn (mixed $item): WallboardFailureLine => WallboardFailureLine::fromArray(Coerce::toArray($item))),
            failedSources: Coerce::mapList($data['failedSources'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'status' => $this->status,
            'tiles' => array_map(static fn (WallboardTile $item): array => $item->toArray(), $this->tiles),
            'incidents' => array_map(static fn (WallboardIncidentLine $item): array => $item->toArray(), $this->incidents),
            'failures' => array_map(static fn (WallboardFailureLine $item): array => $item->toArray(), $this->failures),
            'failedSources' => $this->failedSources,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
