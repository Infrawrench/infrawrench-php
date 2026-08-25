<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class SleepSchedule implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id the schedule powers on and off.
     * @param PluginId::* $pluginId
     * @param string $resourceName Resource display name at read time.
     * @param list<int> $daysOfWeek ISO weekdays the resource is worked on: 1 = Monday … 7 = Sunday.
     * @param string $stopTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string $startTime Wall-clock time of day, 24-hour `"HH:MM"`, in the schedule's timezone.
     * @param string $timezone IANA timezone the wall-clock times are computed in (DST-safe).
     * @param bool $paused Paused schedules keep their timing but never fire.
     * @param string|null $nextTransitionAt Next due transition; null while paused.
     * @param 'stop'|'start'|null $nextTransitionAction A schedule transition: `stop` powers the resource off, `start` powers it on.
     * @param 'stop'|'start'|null $lastRunAction A schedule transition: `stop` powers the resource off, `start` powers it on.
     * @param 'ok'|'failed'|'skipped_freeze'|null $lastRunStatus Outcome of the last executed transition: `ok`, `failed` (see `lastRunError`), or `skipped_freeze` (an org change freeze was in effect, so the transition was skipped).
     * @param string|null $lastRunError Failure detail for a failed run.
     * @param float|null $projectedMonthlySaving Projected monthly saving from trailing per-resource spend × the weekly off-hours fraction; null when billing holds no rows for the resource.
     * @param string|null $currency Currency of the projection, when present.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $resourceId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $resourceName,
        public readonly string $accountName,
        public readonly array $daysOfWeek,
        public readonly string $stopTime,
        public readonly string $startTime,
        public readonly string $timezone,
        public readonly bool $paused,
        public readonly ?string $nextTransitionAt,
        public readonly ?string $nextTransitionAction,
        public readonly ?string $lastRunAt,
        public readonly ?string $lastRunAction,
        public readonly ?string $lastRunStatus,
        public readonly ?string $lastRunError,
        public readonly ?float $projectedMonthlySaving,
        public readonly ?string $currency,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toString($data['resourceName'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            daysOfWeek: Coerce::mapList($data['daysOfWeek'] ?? null, static fn (mixed $item): int => Coerce::toInt($item)),
            stopTime: Coerce::toString($data['stopTime'] ?? null),
            startTime: Coerce::toString($data['startTime'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            paused: Coerce::toBool($data['paused'] ?? null),
            nextTransitionAt: Coerce::toStringOrNull($data['nextTransitionAt'] ?? null),
            nextTransitionAction: Coerce::toStringOrNull($data['nextTransitionAction'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastRunAction: Coerce::toStringOrNull($data['lastRunAction'] ?? null),
            lastRunStatus: Coerce::toStringOrNull($data['lastRunStatus'] ?? null),
            lastRunError: Coerce::toStringOrNull($data['lastRunError'] ?? null),
            projectedMonthlySaving: Coerce::toFloatOrNull($data['projectedMonthlySaving'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
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
            'resourceId' => $this->resourceId,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceName' => $this->resourceName,
            'accountName' => $this->accountName,
            'daysOfWeek' => $this->daysOfWeek,
            'stopTime' => $this->stopTime,
            'startTime' => $this->startTime,
            'timezone' => $this->timezone,
            'paused' => $this->paused,
            'nextTransitionAt' => $this->nextTransitionAt,
            'nextTransitionAction' => $this->nextTransitionAction,
            'lastRunAt' => $this->lastRunAt,
            'lastRunAction' => $this->lastRunAction,
            'lastRunStatus' => $this->lastRunStatus,
            'lastRunError' => $this->lastRunError,
            'projectedMonthlySaving' => $this->projectedMonthlySaving,
            'currency' => $this->currency,
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
