<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class CalendarResponse implements \JsonSerializable
{
    /**
     * @param list<CalendarEvent> $events Soonest first; longer spans before shorter ones.
     * @param list<'change-freeze'|'sleep-schedule'|'expiry'|'commitment-expiry'|'workflow-schedule'|'incident'> $emptyKinds Kinds that were asked for and produced no events in this window.
     * @param list<'change-freeze'|'sleep-schedule'|'expiry'|'commitment-expiry'|'workflow-schedule'|'incident'> $failedKinds Sources that threw. Reported rather than swallowed: 'nothing scheduled' and 'we could not read it' are different answers, and one failing source must not empty the page.
     */
    public function __construct(
        public readonly array $events,
        public readonly string $from,
        public readonly string $to,
        public readonly array $emptyKinds,
        public readonly array $failedKinds,
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
            events: Coerce::mapList($data['events'] ?? null, static fn (mixed $item): CalendarEvent => CalendarEvent::fromArray(Coerce::toArray($item))),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            emptyKinds: Coerce::mapList($data['emptyKinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            failedKinds: Coerce::mapList($data['failedKinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'events' => array_map(static fn (CalendarEvent $item): array => $item->toArray(), $this->events),
            'from' => $this->from,
            'to' => $this->to,
            'emptyKinds' => $this->emptyKinds,
            'failedKinds' => $this->failedKinds,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
