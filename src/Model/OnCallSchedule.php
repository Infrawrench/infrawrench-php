<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class OnCallSchedule implements \JsonSerializable
{
    /**
     * @param int $rotationDays Days per shift. 7 is the common case; 1 gives a daily rotation.
     * @param string $handoffTime Wall-clock time in `timezone` at which the shift changes hands.
     * @param string $startDate The calendar date in `timezone` the first shift begins on. Every later boundary is derived from it, so moving this re-anchors the whole rotation.
     * @param list<OnCallParticipant|null> $participants Rotation order. Reordering re-plans the future, deliberately.
     * @param bool $enabled Off resolves to nobody. A routing destination pointing at a disabled rotation contributes nobody and the rule's other destinations still deliver.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $timezone,
        public readonly int $rotationDays,
        public readonly string $handoffTime,
        public readonly string $startDate,
        public readonly array $participants,
        public readonly bool $enabled,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            rotationDays: Coerce::toInt($data['rotationDays'] ?? null),
            handoffTime: Coerce::toString($data['handoffTime'] ?? null),
            startDate: Coerce::toString($data['startDate'] ?? null),
            participants: Coerce::mapList($data['participants'] ?? null, static fn (mixed $item): ?OnCallParticipant => Coerce::nullable($item, static fn (mixed $value): OnCallParticipant => OnCallParticipant::fromArray(Coerce::toArray($value)))),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'timezone' => $this->timezone,
            'rotationDays' => $this->rotationDays,
            'handoffTime' => $this->handoffTime,
            'startDate' => $this->startDate,
            'participants' => array_map(static fn (?OnCallParticipant $item): array => $item?->toArray(), $this->participants),
            'enabled' => $this->enabled,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
