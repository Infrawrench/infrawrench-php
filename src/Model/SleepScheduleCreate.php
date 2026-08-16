<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class SleepScheduleCreate implements \JsonSerializable
{
    /**
     * @param list<int> $daysOfWeek ISO weekdays the resource is worked on: 1 = Monday … 7 = Sunday.
     * @param string $stopTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string $startTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string $timezone IANA timezone the wall-clock times are computed in (DST-safe).
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly array $daysOfWeek,
        public readonly string $stopTime,
        public readonly string $startTime,
        public readonly string $timezone,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            daysOfWeek: Coerce::mapList($data['daysOfWeek'] ?? null, static fn (mixed $item): int => Coerce::toInt($item)),
            stopTime: Coerce::toString($data['stopTime'] ?? null),
            startTime: Coerce::toString($data['startTime'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
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
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'daysOfWeek' => $this->daysOfWeek,
            'stopTime' => $this->stopTime,
            'startTime' => $this->startTime,
            'timezone' => $this->timezone,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
