<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class MomentResponse implements \JsonSerializable
{
    /**
     * @param string $at The centre timestamp, normalized to ISO.
     * @param int $windowMinutes The half-window actually applied, after clamping to 1–4320 minutes.
     * @param list<MomentFeedStatus> $feeds One entry per feed, in canonical order — including omitted and errored feeds.
     * @param list<MomentEvent> $events Chronological, oldest first.
     * @param list<MomentIncidentSpan> $incidents
     */
    public function __construct(
        public readonly string $at,
        public readonly string $from,
        public readonly string $to,
        public readonly int $windowMinutes,
        public readonly string $generatedAt,
        public readonly array $feeds,
        public readonly array $events,
        public readonly array $incidents,
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
            at: Coerce::toString($data['at'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            windowMinutes: Coerce::toInt($data['windowMinutes'] ?? null),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
            feeds: Coerce::mapList($data['feeds'] ?? null, static fn (mixed $item): MomentFeedStatus => MomentFeedStatus::fromArray(Coerce::toArray($item))),
            events: Coerce::mapList($data['events'] ?? null, static fn (mixed $item): MomentEvent => MomentEvent::fromArray(Coerce::toArray($item))),
            incidents: Coerce::mapList($data['incidents'] ?? null, static fn (mixed $item): MomentIncidentSpan => MomentIncidentSpan::fromArray(Coerce::toArray($item))),
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
            'at' => $this->at,
            'from' => $this->from,
            'to' => $this->to,
            'windowMinutes' => $this->windowMinutes,
            'generatedAt' => $this->generatedAt,
            'feeds' => array_map(static fn (MomentFeedStatus $item): array => $item->toArray(), $this->feeds),
            'events' => array_map(static fn (MomentEvent $item): array => $item->toArray(), $this->events),
            'incidents' => array_map(static fn (MomentIncidentSpan $item): array => $item->toArray(), $this->incidents),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
