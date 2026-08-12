<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class IncidentTimeline implements \JsonSerializable
{
    /**
     * @param string $to `resolvedAt`, or the server's clock while the incident is open.
     * @param list<IncidentTimelineEntry> $entries
     * @param list<array{feed: string, status: 'ok'|'omitted'|'error', error?: string|null}> $feeds Per-feed health, passed through from the moment union: `omitted` means the caller lacks that feed's read permission, `error` means it failed and the rest is still good.
     */
    public function __construct(
        public readonly string $incidentId,
        public readonly string $from,
        public readonly string $to,
        public readonly string $generatedAt,
        public readonly array $entries,
        public readonly array $feeds,
        public readonly bool $truncated,
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
            incidentId: Coerce::toString($data['incidentId'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
            entries: Coerce::mapList($data['entries'] ?? null, static fn (mixed $item): IncidentTimelineEntry => IncidentTimelineEntry::fromArray(Coerce::toArray($item))),
            feeds: Coerce::mapList($data['feeds'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'incidentId' => $this->incidentId,
            'from' => $this->from,
            'to' => $this->to,
            'generatedAt' => $this->generatedAt,
            'entries' => array_map(static fn (IncidentTimelineEntry $item): array => $item->toArray(), $this->entries),
            'feeds' => $this->feeds,
            'truncated' => $this->truncated,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
