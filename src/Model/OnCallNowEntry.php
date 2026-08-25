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

final class OnCallNowEntry implements \JsonSerializable
{
    public function __construct(
        public readonly string $scheduleId,
        public readonly string $scheduleName,
        public readonly bool $enabled,
        public readonly ?OnCallShift $shift,
        public readonly ?OnCallParticipant $next,
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
            scheduleId: Coerce::toString($data['scheduleId'] ?? null),
            scheduleName: Coerce::toString($data['scheduleName'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            shift: Coerce::nullable($data['shift'] ?? null, static fn (mixed $value): OnCallShift => OnCallShift::fromArray(Coerce::toArray($value))),
            next: Coerce::nullable($data['next'] ?? null, static fn (mixed $value): OnCallParticipant => OnCallParticipant::fromArray(Coerce::toArray($value))),
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
            'scheduleId' => $this->scheduleId,
            'scheduleName' => $this->scheduleName,
            'enabled' => $this->enabled,
            'shift' => $this->shift?->toArray(),
            'next' => $this->next?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
